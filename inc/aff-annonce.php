                              <table cellpadding=2 style="width:58%">
                <?php 
  if ($nbr_ligne_total==0)
    {echo '<tr><td><h3><b>aucun article disponible<b></h3></td></tr>';}
  else
  { $cols=1;
                while($row = mysql_fetch_array($res)){

                   $idannonce=$row['id'];
                   $offre=$row['offre'];
                   $type=$row['type'];
                   $annonceur=$row['annonceur'];
                   $pays=$row['pays'];
                   $region=$row['region'];
                   $departement=$row['departement'];
                   $prix=$row['prix'];
                   $surface=$row['surface'];
                   $description=$row['description'];
                   $image=$row['image'];
                   $video=$row['video'];
                   $detail=$row['detail'];
                   $date=$row['date'];
                   $nbrvote=$row['nbrvote'];

                    $req2 = "SELECT `image` FROM `image` WHERE `num-annonce`=".$idannonce ;
                    $res2 = mysql_query($req2) or die('Erreur SQL !<br />'.$req2.'<br />'.mysql_error());
                    $row2 = mysql_fetch_array($res2);
                    if ($cols==1){echo '<tr>';};
                    ?>

                      <td>
                        <div class="art-wrapper">
                          <section class="art-row">
                            <div class="art-container-item">
                              <div class="art-item" style='background-image:url(img/upload/<?php echo $row2['image'] ?>);'>
                                <div class="art-item-overlay">
                                  <div class="art-sale-tag"><span><?php  if ($type==1){echo 'vente';}
                                  elseif ($type==2){ echo 'location';}
                                  else {echo 'V/L';}; ?></span></div>
                                </div>
                                <div class="art-item-content">
                                  <div class="art-item-top-content">
                                    <div class="art-item-top-content-inner">
                                      <div class="art-item-product">
                                        <div class="art-item-top-title" style='margin: 0;'>
                                          <h2><?php echo $offre ?></h2>
                                          <p class="art-subdescription" style='margin: 0;'>
                                            <?php echo $surface.'m²' ?>
                                          </p>
                                        </div>
                                      </div>
                                      <div class="art-item-product-price" style='margin: 0;'>
                                        <span class="art-price-num" style='margin: 0;'><?php echo $prix.'€' ?></span>
                                      </div>
                                    </div>  
                                  </div>
                                  <div class="art-item-add-content">
                                    <div class="art-item-add-content-inner">
                                      <!-- <div class="section">
                                        <h4>Sizes</h4>
                                        <p>40,41,42,43,44,45</p>
                                      </div> -->
                                      <div class="art-section" style='width:160px;float:left'>
                                        <a href="annonce.php?id=<?php echo $idannonce ?>" class="art-btn art-buy art-expand" style='position:relative;top:-5px'>Plus d'info</a>
                                      </div>
                                        <?php echo'<a class="savelien" id="save'.$idannonce.'" onclick="save('.$idannonce.')" href="#" alt="enregistrer"><span class="lb_close saveimage"  style="position:relative;top:-2px;float:right;margin: 0 auto -32px;"></span></a>
                                        <a class="unsavelien" id="saved'.$idannonce.'" onclick="unsave('.$idannonce.')" href="#" alt="supprimer"><span class="lb_close savedimage" style="float:right;float:right;"></span></a>';

                         
                         if (isset($_SESSION['id'])){
                          $req3 = "SELECT * FROM `save` WHERE `idannonceur`=".$_SESSION['id']." AND `idannonce`=".$idannonce; 
                          $res3 = mysql_query($req3) or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
                          $row3 = mysql_fetch_array($res3);
                          if (isset($row3['id']))echo'<script>$("#save'.$idannonce.'").hide();</script>';
                         };
                         ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </td>


                      <?php
                      $cols++;
                    if ($cols==4){echo'</tr>';$cols=1;};
                    }; 

?>
              
              </table>
              <ul class="pagination">
                <?php 
                $nbr_page=ceil($nbr_ligne_total/15);

                  if (isset($_GET['p']))
                  {$p=$_GET['p'];}
                
                  else $p=1;
                  $deb=($p -1)*15+1;

                  if ($p!=1){ ?>  <li><a href="index.php?p=<?php $p1=$p-1;echo $p1;echo $info ; ?>">&laquo;</a></li> <?php };

                    for ($i = 1; $i <= $nbr_page; $i++){ 

                        echo'<li>';
                          if ($p==$i){
                            echo'<a style="color:#999999;cursor:default;">'.$i.'</a>';
                          }else{

                            echo'<a href="index.php?p='.$i.$info.'">'.$i.'</a>';
                          };

                        echo'</li>';
                    } ?>

                <?php if ($p!=$nbr_page){ ?> <li><a href="index.php?p=<?php $p1=$p+1;echo $p1.$info ; ?>">&raquo;</a></li><?php };?>
              </ul>

<?php
            } 
            
  ?>