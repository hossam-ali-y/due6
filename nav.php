 <link rel="shortcut icon" href="images/icons/ic_txn_empty.png">  
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="nav-inner">
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>القائمة</h2>
              </div>
              <ul style="display:none;position: absolute;margin-top: 6px;" class="submenu">
                <li>
				
                  <ul class="topnav">
				  <!--li class="level0 nav-6 level-top first parent"> <a id="home" class="level-top" href="index.php"> <span>الرئيسية</span> </a-->
                
                    </li>
					     <li id="mobile_invo_active" class="level0 level-top parent"> <a class="level-top" id="admin" href="#"><span>الفواتيــــــر</span></a></li>
						 
                    <li id="mobile_custom_active" class="level0 nav-1 level-top first parent" > <a class="level-top" href="#"> <span>الحســــــابات</span></a>  </li>
                    </li>
			  <li class="level0 parent drop-menu"><a href="#"><span>الإعــــــدادات</span></a></li>


              
                
                  </ul>
                </li>
		
              </ul>
            </li>
          </ul>
          <!--navmenu-->
        </div>
        <!--End mobile-menu -->
        <ul id="nav" class="hidden-xs">	
          <li id="nav-home" class="level0 parent drop-menu"><a id="home1" href="index.php"><span>الرئيسية</span> </a>
         
          </li>
		  			
					<?php if(isset($_SESSION['u_name'])){	?>
   <li class="level0 parent drop-menu"><a href="#"><span>حسابي</span></a>
           <ul class="level1" style="display: none;">
		  <li><a  href="index.php" title="<?php  echo $_SESSION['u_name']; ?>">صفحتي الشخصية </a></li>
				 <li><a href="#edituserModal" title="<?php echo ' البيانات الشخصية ل '.$_SESSION['u_name']?>" data-toggle="modal" >ملفي الشخصي</a></li>
     
		  <?php if(isset($_SESSION['status'])) {  
		  echo "<li><a href='admin/ad.php'>Content Manag</a></li>";
		  echo"<li><a href='admin/modifyusers.php'>users managment</a></li>";
		} ?> 

          </ul>
      </li>
	   <?php 
		  }?>
      <li id="invo_active" class="level0 parent drop-menu"><a href="#"><span>الفواتير</span></a>
 
      </li>

         <li id="custom_active" class="level0 parent drop-menu"> <a href="#"> <span>الحسابات</span></a>

      </li>

<!-- Navbar (sit on top) -->

          <li class="level0 nav-7 level-top parent"> <a href="#" class="level-top"> <span>الإعدادات</span> </a>
        
          </li>

        <li  class="nav-custom-link level0 level-top parent"> <a class="level-top" id="admin1" href="#"><span>تسجيل الدخول</span></a></li>

          <li class="nav-custom-link level0 level-top parent"> <a class="level-top" href="#"><span>حول الموقع</span></a>
       </li>
        </ul>
        <div id="form-search" class="search-bar">
          <form id="search_mini_form" action="#" method="get">
		              <span class="search-icon"style="font-size:20px" id="rssearchspan">🔎</span>
            <input class="search-bar-input" placeholder="إبحث هنا" type="text" value="" name="search" id="search">
            <input id="searchdone"class="search-bar-submit" type="button" value="">

          </form>
        </div>
      </div>
    </div>
  </nav>
 
  <!-- end nav -->