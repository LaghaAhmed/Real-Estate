<?php

/**
 * Classe de chargement des données liées à une vidéo.
 * Il faut lui passer le champ embed.
 * Cette classe ne fonctionne que pour les vidéos youtube et dailymotion
 *
 * @author : Esteban Manuel
 * @version : 1.0
 * @date : 09/09/2008
 * @modified : 10/11/2008
 */

class Video{
	
	/**
	 * Vidéo type (Youtube, dailymotion)
	 *
	 * @var string
	 */
	var $type;
	
	/**
	 * Champ embed de la vidéo
	 *
	 * @var string
	 */
	var $embed;

	/**
	 * Adresse de la vidéo
	 *
	 * @var string
	 */
	var $url;
	
	/**
	 * Auteur de la vidéo
	 *
	 * @var string
	 */
	var $author;
	
	/**
	 * Titre de la vidéo
	 *
	 * @var string
	 */
	var $title;
	
	/**
	 * Description de la vidéo
	 *
	 * @var string
	 */
	var $desc;
	
	/**
	 * Lien vers la vidéo
	 *
	 * @var string
	 */
	var $href;
	
	/**
	 * Images minatures de la vidéo
	 *
	 * @var array
	 */
	var $thumbs;
	
	/**
	 * Constructeur PHP4
	 */
	function Video( $embed ){
		$this->__construct( $embed );
	}
	
	/**
	 * Constructeur PHP5
	 */
	function __construct( $embed ){
		$this->embed = $embed;
		
		//Détermination du type de la vidéo
		$this->getData();
	}
	
	/**
	 * GETTERS
	 */
	function getType(){ return $this->type; }
	function getUrl(){ return $this->url; }
	function getAuthor(){ return $this->author; }
	function getTitle(){ return $this->title; }
	function getDesc(){ return $this->desc; }
	function getHref(){ return $this->href; }
	function getThumbs(){ return $this->thumbs; }
	
	/**
	 * Récupération de l'ensemble des données de la vidéo.
	 */
	function getData(){
		//On récupére le type de vidéo
		$youtube_pattern = "<embed src=\"http://www.youtube.com/";
		$dailymotion_pattern = "<embed src=\"http://www.dailymotion.com/";
		if(strpos($this->embed, $youtube_pattern)){
			$this->type = "youtube";
		}elseif(strpos($this->embed, $dailymotion_pattern)){			
			$this->type = "dailymotion";
		}
		
		//on récupère l'adresse de la vidéo		
		$pattern = '/http:\/\/www.[a-z,A-Z,.,&,=,_,\/,0-9]{1,}/';
		$get_video_link = preg_match($pattern, $this->embed, $video_params);
		$this->url = $video_params[0];
		
		//On récupère le href
		switch( $this->type ){
			case "dailymotion":
				$pattern = '/http:\/\/www.[a-z,A-Z,.,&,=,_,\-,\/,0-9]{1,}/';
				$get_video_href = preg_match_all($pattern, $this->embed, $video_params);
				if(count($video_params)){
					$this->href = $video_params[0]['2'];
				}
			break;
			
			case "youtube":
				$this->href = $this->url;
			break;
		}
		
		//On récupère toutes les données
		switch( $this->type ){
			case "dailymotion":
				$did = $this->getId( $this->href );
				$file_content = @file_get_contents("http://www.dailymotion.com/atom/fr/cluster/extreme/featured/video/".$did);
				$videoid = $this->loadSwf( $file );
				if($did != null){
					$this->title  	= ($this->loadTitle( $file_content ));
					$this->author 	= ($this->loadAuthor( $file_content ));
					$this->desc    	= ($this->loadDescription( $file_content ));
					$this->thumbs  	= ($this->loadThumbs( $file_content ));					
				}
			break;
			
			case "youtube":
				$videoid_untrim = $this->getId( $this->href );		
				$videoid = trim($videoid_untrim);  //removes whitespaces at the end	
				$file_content = @file_get_contents("http://www.youtube.com/api2_rest?method=youtube.videos.get_details&dev_id=BnvzCjJ_Bzw&video_id=".$videoid);			

				if($videoid !== null){
					$this->title  	= $this->loadTitle( $file_content );					
					$this->author 	= $this->loadAuthor( $file_content );					
					$this->desc    	= $this->loadDescription( $file_content );				
					$this->thumbs 	= $this->loadThumbs( $videoid );
				}
			break;
		}
	}
	
	/**
	 * Retourne l'id d'une vidéo en fonction de sa provenance
	 *
	 * @param string $url
	 * @return string
	 */
	function getId( $url ){
		$id = "";
		switch($this->type){
			case "dailymotion":				
				$checkdm = explode(".", $url);
				
				if ($checkdm[1] == "dailymotion" ){	
					//gets vid id
					$dm_start = explode("/video/",$url,2);
					$dm_end = explode("&",$dm_start[1],2);
					$gotid = $dm_end[0];
					return $gotid;
				}
			break;
			
			case "youtube":
				//checks if valid youtube link		
				$checkyt = explode(".", $url);
				
				if ($checkyt[1] == "youtube" ){		
					//gets vid id
					$yt_start = explode("v/",$url,2);
					$yt_end = explode("&",$yt_start[1],2);
					$gotid = $yt_end[0];
					return $gotid;
				}
			break;
		}
		return $id;
	}
	
	/**
	 * Fonction qui récupère le titre d'une vidéo en fonction de sa provenance
	 *
	 * @param string $str
	 * @return string
	 */
	function loadTitle( $file ){
		$title = "";
		switch($this->type){
			case "dailymotion":	
				$dm_xml_pic_start = explode("<title>", $file, 2);
				$dm_xml_pic_end = explode("</title>", $dm_xml_pic_start[1], 2);
				$title = $dm_xml_pic_end[0];
			break;
			
			case "youtube":
				$yt_xml_title_start = explode("<title>", $file, 2);
				$yt_xml_title_end = explode("</title>", $yt_xml_title_start[1], 2);
				$title = $yt_xml_title_end[0];
			break;
		}
		return $title;
	}
	
	/**
	 * Récupèration de l'auteur en fonction de la provenance de la vidéo
	 *
	 * @param string $file
	 * @return string
	 */
	function loadAuthor( $file ){
		$author = "";
		switch($this->type){
			case "dailymotion":	
				$dm_xml_pic_start = explode("<author><name>", $file, 2);
				$dm_xml_pic_end = explode("</name><uri>", $dm_xml_pic_start[1], 2);
				$author = $dm_xml_pic_end[0];
			break;
			
			case "youtube":
				$yt_xml_author_start = explode("<author>", $file,2);
				$yt_xml_author_end = explode("</author>", $yt_xml_author_start[1], 2);
				$author = $yt_xml_author_end[0];
			break;
		}
		return $author;		
	}
	
	/**
	 * Chargement de la description d'une vidéo en fonction de sa provenance
	 *
	 * @param string $file
	 * @return string
	 */
	function loadDescription( $file ){
		$desc = "";
		switch($this->type){
			case "dailymotion":	
				$dm_xml_pic_start = explode("<content type=\"html\">", $file, 2);
				$dm_xml_pic_end = explode("<", $dm_xml_pic_start[1], 2);
				$desc = $dm_xml_pic_end[0];
			break;
			
			case "youtube":
				$yt_xml_description_start = explode("<description>", $file, 2);
				$yt_xml_description_end = explode("</description>", $yt_xml_description_start[1], 2);
				$desc = $yt_xml_description_end[0];
			break;
		}
		return $desc;	
	}
	
	/**
	 * Chargement des images d'une vidéo en fonction de sa provenance
	 *
	 * @param string $data
	 * @return array
	 */
	function loadThumbs( $data ){
		$thumbs = array();
		switch($this->type){
			case "dailymotion":	
				$dm_xml_pic_start = explode("type=\"image/jpeg\" href=\"", $data, 2);
				$dm_xml_pic_end = explode("\"", $dm_xml_pic_start[1], 2);
				$dm_pic = $dm_xml_pic_end[0];
				$imgparams = substr($dm_pic, strrpos($dm_pic, '/') +1 );
				$thumbs[] = "http://limelight-450.static.dailymotion.com/dyn/preview/160x120/".$imgparams; 
			break;
			
			case "youtube":	
				$thumbs[]  = "http://img.youtube.com/vi/".$data."/1.jpg";
				$thumbs[]  = "http://img.youtube.com/vi/".$data."/2.jpg";
				$thumbs[]  = "http://img.youtube.com/vi/".$data."/3.jpg";	
			break;
		}
		return $thumbs;	
	}		
	
	/**
	 * Chargement du swf en fonction de la provenance de la vidéo
	 *
	 * @param string $file
	 * @return string
	 */
	function loadSwf( $file ){
		$swf = array();
		switch($this->type){
			case "dailymotion":	
				$dm_xml_pic_start = explode("/swf/", $file, 2);
				$dm_xml_pic_end = explode("\"", $dm_xml_pic_start[1], 2);
				$swf = $dm_xml_pic_end[0];
			break;
			
			case "youtube":	
			break;
		}
		return $swf;	
	}
	
}

?>