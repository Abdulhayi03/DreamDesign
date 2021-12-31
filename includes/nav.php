<?php 


$sql = "select * from categories";
    $cat_res = mysqli_query($con, $sql);
    $cat_arr = array();
    while($row=mysqli_fetch_assoc($cat_res)){
      $cat_arr[]=$row;
    };

?>


<div class="categories-grid wow fadeInLeft">
            <nav class="categories text-center">
              <ul id="example" class="portfolio_filter">
                <!-- <li class="resp-li"><a href="" class=""></a></li>-->

                <li><a href="./allProjects.php">All</a></li>
                <?php 
                  
                    foreach($cat_arr as $list){
                ?>
                    <li><a href="./portfolio.php?id=<?php echo $list['id'];?>"> <?php echo $list['category']; ?></a></li>
                    
                <?php } ?>
                <li><a href="./360.php">360° rooms</a></li>


                <!-- DUMMY DATA -->

                    <!-- <li><a href="" data-filter=".360°">360° rooms</a></li>
                    <li>
                      <a href="" data-filter=".3dmodeling">3D Product Modeling</a>
                    </li>
                    <li><a href="" data-filter=".interiors">Interiors</a></li>
                    <li><a href="" data-filter=".exteriors">Exteriors</a></li>
                    <li>
                      <a href="" data-filter=".productdocumentation"
                        >Product documentation</a
                      >
                    </li>
                    <li>
                      <a href="" data-filter=".clientproposals">Client proposals</a>
                    </li> -->

                <!-- END DUMMY DATA -->
                
              </ul>
                    </nav>
          </div>

          <script>
                $(function () {
                    $('nav li a').filter(function () {
                        return this.href === location.href;
                    }).addClass('active');
                });
         </script>