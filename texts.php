<!DOCTYPE html>
<html lang="en">

<head>
   <title>Saliya Auto Care web editor</title>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
   <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

   <!-- Weather css -->
   <link href="assets/css/svg-weather.css" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   <!--font asome-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   <style>
      body {
    overflow-y: hidden; /* Hides vertical scrollbar */
      }
      .testClass{
        border-radius: 0px;
        border: 2px dashed #bbb5ff;
        width:196px;
        display: flex; 
        align-items: center; 
        justify-content: center; 
        height: 100px; 
        border: 1px dashed #ccc;
        background-position: center;
        background-size: cover;
      }

.button2 {
  --width: 96px;
  --height: 30px;
  --tooltip-height: 35px;
  --tooltip-width: 90px;
  --gap-between-tooltip-to-button: 18px;
  --button-color: #222;
  --tooltip-color: #fff;
  width: var(--width);
  font-size: 12px;
  height: var(--height);
  background: var(--button-color);
  position: relative;
  text-align: center;
  font-family: "Arial";
  transition: background 0.3s;
}
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <a href="mainMenu001.html" style="background-color: #39444e; color: #f5f5f5; font-weight: bold;" class="logo">Saliya Auto Care Web Editor</a>
         <nav class="navbar navbar-static-top">
            <ul class="top-nav lft-nav">
               <div class="upgrade-button">
                <button onclick="window.open('https://quadcodecrafters.github.io/SaliyaAutoCareWeb-proposed-/')" style="margin-left: 2px;" type="button" class="button">
                    Web Preview
                  </button>
                </div>
                <script>
                  function refreshIframe() {
                  // Reloads the page from the cache
                  location.reload();
                 // Forces a reload from the server
                  location.reload(true);
                  }
                </script>
                <div class="upgrade-button">
                    <button type="button" onclick="refreshIframe()" class="button">
                        Refresh
                      </button>
                </div>
                
            </ul>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
               <ul class="top-nav">
                   <!-- window screen -->
                   <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen" style="color: rgb(65, 64, 64);"></i>
                     </a>

                  </li>
                  <div class="upgrade-button">
                    <button class="Btn">
  
                        <div class="sign"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve"><g><g><g><path d="M466.208,88.458L380.875,3.125c-2-2-4.708-3.125-7.542-3.125H42.667C19.146,0,0,19.135,0,42.667v384 c0,23.531,19.146,42.667,42.667,42.667h384c23.521,0,42.667-19.135,42.667-42.667V96 C469.333,93.167,468.208,90.458,466.208,88.458z M106.667,21.333h234.667v128c0,11.76-9.563,21.333-21.333,21.333H128 c-11.771,0-21.333-9.573-21.333-21.333V21.333z M384,448H85.333V256H384V448z M448,426.667c0,11.76-9.563,21.333-21.333,21.333 h-21.333V245.333c0-5.896-4.771-10.667-10.667-10.667h-320c-5.896,0-10.667,4.771-10.667,10.667V448H42.667 c-11.771,0-21.333-9.573-21.333-21.333v-384c0-11.76,9.563-21.333,21.333-21.333h42.667v128C85.333,172.865,104.479,192,128,192 h192c23.521,0,42.667-19.135,42.667-42.667v-128h6.25L448,100.417V426.667z"/><path d="M266.667,149.333h42.667c5.896,0,10.667-4.771,10.667-10.667V53.333c0-5.896-4.771-10.667-10.667-10.667h-42.667 c-5.896,0-10.667,4.771-10.667,10.667v85.333C256,144.562,260.771,149.333,266.667,149.333z M277.333,64h21.333v64h-21.333V64z" /></g></g></g></svg></div>
                        
                        <div class="text">Save</div>
                      </button>
                   </div>
                  <!-- User Menu-->
                  <div class="upgrade-button">
                    <a href="index.html" class="Btn">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Logout</div>
                    </a>
                   </div>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="nav-level"><span style="color: white;">---</span> Web</li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="mainMenu001.html">
                        <i class="icon-globe"></i><span> Web Preview</span>
                    </a>
                </li>  
               
                <li class="nav-level"><span style="color: white;">---</span> Edit</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-picture"></i><span>Main Images</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                <!---LOOP OF MAIN IMAGES--->
                <!---START--->
                <?php
                    $nameSet = array("About Image","About Page Image Strip","Brand Background","Contact Us Image Strip","Customer 1 Face",
                    "Customer 2 Face","Customer 3 Face","Customer 4 Face","Main Background 1","Main Background 2","News 1","News 2","News 3","News 4","News 5","Home page service 1"
                    ,"Home page service 2");
for($i = 0; $i < 17; $i++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet[$i] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                        <label for="input-file-' . $i . '" id="drop-area-' . $i . '">
                            <input type="file" accept="image/*" id="input-file-' . $i . '" hidden>
                            <div id="img-view-' . $i . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" 
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn" id="discardBtn-' . $i . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
            </div>  
        </ul>
    </li>

    <script>
        document.getElementById("input-file-' . $i . '").addEventListener("change", function() {
            let imgLink = URL.createObjectURL(this.files[0]);
            let imgView = document.getElementById("img-view-' . $i . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("drop-area-' . $i . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area-' . $i . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile = document.getElementById("input-file-' . $i . '");
            inputFile.files = e.dataTransfer.files;
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            let imgView = document.getElementById("img-view-' . $i . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("discardBtn-' . $i . '").addEventListener("click", function(event) {
            let imgView = document.getElementById("img-view-' . $i . '");
            let inputFIle = document.getElementById("input-file-' . $i . '");
            imgView.style.backgroundImage = "";
            imgView.textContent = "Drag & drop or click here";
            imgView.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle.value = "";
            event.preventDefault();
        });
    </script>
    ';
}
?>
                <!---END--->
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-picture"></i><span>Images</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                <!---LOOP OF IMAGES--->
                <?php
                    $nameSet2 = array("Home page service 3","Home page service 4","Service Page Side Image1","Service Page Side Image2","Service Page Side Image3",
                    "Service Page Side Image4","Service back Image1","Service back Image2","Service back Image3","Service back Image4","Interior 1","Interior 2","Interior 3","Interior 4","Interior 5","Interior 6"
                    );
for($p = 0; $p < 16; $p++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet2[$p] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                        <label for="input-file2-' . $p . '" id="drop-area2-' . $p . '">
                            <input type="file" accept="image/*" id="input-file2-' . $p . '" hidden>
                            <div id="img-view2-' . $p . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" 
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn2" id="discardBtn2-' . $p . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
            </div>  
        </ul>
    </li>

    <script>
        document.getElementById("input-file2-' . $p . '").addEventListener("change", function() {
            let imgLink2 = URL.createObjectURL(this.files[0]);
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            imgView2.style.backgroundImage = `url(${imgLink2})`;
            imgView2.textContent = "";
            imgView2.style.border = 0;
        });

        document.getElementById("drop-area2-' . $p . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area2-' . $p . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile2 = document.getElementById("input-file2-' . $p . '");
            inputFile2.files = e.dataTransfer.files;
            let imgLink2 = URL.createObjectURL(inputFile2.files[0]);
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            imgView2.style.backgroundImage = `url(${imgLink2})`;
            imgView2.textContent = "";
            imgView2.style.border = 0;
        });

         document.getElementById("discardBtn2-' . $p . '").addEventListener("click", function(event) {
            let imgView2 = document.getElementById("img-view2-' . $p . '");
            let inputFIle2 = document.getElementById("input-file2-' . $p . '");
            imgView2.style.backgroundImage = "";
            imgView2.textContent = "Drag & drop or click here";
            imgView2.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle2.value = "";
            event.preventDefault(); 
            });
    </script>
    ';
}
?>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-pencil"></i><span>Icons</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                    <!---ICONS 15 START--->
                    <?php
                    $nameSet3 = array("Vision Logo","Mission Logo","Company logo 1","Company logo 2","Company logo 3",
                    "Company logo 4","Company logo 5","Company logo 6","Background logo 1","Background logo 2","Background logo 3","Facts logo 1","Facts logo 2","Facts logo 3");
for($s = 0; $s < 14; $s++) {
    echo '
    <li class="treeview">
        <a class="waves-effect waves-dark" href="#!">
            <span> ' . $nameSet3[$s] . ' </span><i class="icon-arrow-down"></i>
        </a>
        <ul class="treeview-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="height: 110px;">
                        <label for="input-file3-' . $s . '" id="drop-area3-' . $s . '">
                            <input type="file" accept="image/*" id="input-file3-' . $s . '" hidden>
                            <div id="img-view3-' . $s . '" class="testClass" style="display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc;">
                                <p style="text-align: center; margin: 0;">Drag & drop or click here</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">       
                        <button class="button2" 
                                style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#006400\'"
                                onmouseout="this.style.backgroundColor=\'#008000\'">Apply
                        </button>
                        <button class="button2" name="discardBtn3" id="discardBtn3-' . $s . '" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                onmouseover="this.style.backgroundColor=\'#a4161a\'" 
                                onmouseout="this.style.backgroundColor=\'#ba181b\'">Discard
                        </button>
                    </div>
                </div>
            </div>  
        </ul>
    </li>

    <script>
        document.getElementById("input-file3-' . $s . '").addEventListener("change", function() {
            let imgLink = URL.createObjectURL(this.files[0]);
            let imgView = document.getElementById("img-view3-' . $s . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("drop-area3-' . $s . '").addEventListener("dragover", function(e) {
            e.preventDefault();
        });

        document.getElementById("drop-area3-' . $s . '").addEventListener("drop", function(e) {
            e.preventDefault();
            let inputFile = document.getElementById("input-file3-' . $s . '");
            inputFile.files = e.dataTransfer.files;
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            let imgView = document.getElementById("img-view3-' . $s . '");
            imgView.style.backgroundImage = `url(${imgLink})`;
            imgView.textContent = "";
            imgView.style.border = 0;
        });

        document.getElementById("discardBtn3-' . $s . '").addEventListener("click", function(event) {
            let imgView = document.getElementById("img-view3-' . $s . '");
            let inputFIle3 = document.getElementById("input-file3-' . $s . '");
            imgView.style.backgroundImage = "";
            imgView.textContent = "Drag & drop or click here";
            imgView.style = "display: flex; align-items: center; justify-content: center; height: 100px; border: 1px dashed #ccc; font-size:13px;";
            inputFIle3.value = "";
            event.preventDefault(); 
            });
    </script>
    ';
}
?>
                    </ul>
                </li>
                <!---ICONS 15 END--->
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-building"></i><span> Company Information</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <!--TEXT EDITORS START--->
                        <li>
                            <li class="treeview"><a class="waves-effect waves-dark" href="#!"><span>Accordation</span><i class="icon-arrow-down"></i></a>
                                <ul class="treeview-menu">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label id="drop-area">
                                                    <textarea style=" width: 196px;
                                                    height: 150px;
                                                    border: 1px solid #ccc;
                                                    text-align: left;
                                                    vertical-align: top;
                                                    padding: 5px;
                                                    box-sizing: border-box;
                                                    resize: none;
                                                    font-family: Arial, sans-serif;
                                                    font-size: 14px;" placeholder="Start typing here..."></textarea>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">       
                                                <button class="button2" 
                                                        style="border-color: transparent; color: white; background-color: #008000; transition: background-color 0.3s;" 
                                                        onmouseover="this.style.backgroundColor='#006400'" 
                                                        onmouseout="this.style.backgroundColor='#008000'">Apply
                                                </button>
                                                <button class="button2" style="border-color: transparent; color: white; background-color: #ba181b; transition: background-color 0.3s;" 
                                                        onmouseover="this.style.backgroundColor='#a4161a'" 
                                                        onmouseout="this.style.backgroundColor='#ba181b'"> Discard
                                                </button>
                                            </div>
                                        </div>
                                      </div>  
                                </ul>
                            </li>
                        <!--TEXT EDITORS END--->
                    </ul>
                </li>
                
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-link"></i><span> Social Media Links</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                      <li><a class="waves-effect waves-dark" href="form-elements-bootstrap.html"><i class="icon-arrow-right"></i> Form Elements Bootstrap</a></li>
                      
                      <li><a class="waves-effect waves-dark" href="form-elements-advance.html"><i class="icon-arrow-right"></i> Form Elements Advance</a></li>
                  </ul>
              </li>
              <li class="nav-level"><span style="color: white;">---</span> Company Information</li>
                <li class="treeview">                   
                  <a class="waves-effect waves-dark" href="texts.php">
                      <i class="fa fa-font"></i><span> Texts</span>
                  </a>                
              </li>
              <li class="nav-level"><span style="color: white;">---</span> Extras</li>
                <li class="treeview">
                  <a class="waves-effect waves-dark" href="basic-table.html">
                      <i class="fa fa-download"></i><span> Image Genarator</span>
                  </a>                
              </li>
              <li class="treeview">
               <a class="waves-effect waves-dark" href="color.html">
                   <i class="fa fa-question-circle"></i><span> Help</span>
               </a>                
           </li>
            </ul>
         </section>
      </aside>
      <div class="content-wrapper">
         <iframe style="border-color: transparent;" id="myIframe" class="fullscreen" src="https://quadcodecrafters.github.io/SaliyaAutoCareWeb-proposed-/" height="700px" width="1130px"></iframe>
      </div>
   </div>

   <!-- Required Jqurey -->
   <script src="assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- Sparkline charts -->
   <script src="assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

   <!-- Counter js  -->
   <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="assets/plugins/countdown/js/jquery.counterup.js"></script>

   <!-- Echart js -->
   <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script type="text/javascript" src="assets/pages/dashboard.js"></script>
   <script type="text/javascript" src="assets/pages/elements.js"></script>
   <script src="assets/js/menu.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>
