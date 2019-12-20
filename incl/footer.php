<footer id="footer" class="footer-1 top-buffer">
    <div class="main-footer widgets-dark typo-light">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget subscribe no-box">
                        <h5 class="widget-title">Wide World Importers<span></span></h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut tellus interdum nisl suscipit dapibus et sit amet neque. Nulla aliquet dolor nibh, id aliquam augue tempus eu. Morbi in euismod odio.   </p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget geen no-box">
                        <h5 class="widget-title">Snelle Navigatie<span></span></h5>
                        <ul class="thumbnail-widget list-unstyled">
                            <li>
                                <div class="thumb-content"><a href="../Pages/index.php">Home</a></div>
                            </li>
                            <li>
                                <div class="thumb-content"><a href="../Pages/all_products.php">All products</a></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget no-box">
                        <h5 class="widget-title">Klantenservice<span></span></h5>
                        <a class="btn" href="../Pages/contact.php">Contact</a><br>
                        <?php if(empty($_SESSION['loginsucesesvol'])){
                            echo "<a class=\"btn\" href=\"../Pages/signup.php\" target=\"_blank\">Register Now</a>";
                        }?>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="widget no-box">
                        <h5 class="widget-title">Volg ons op sociale media<span></span></h5>

                        <p><a href="wordwideimporters@gmail.com" title="glorythemes">WWI@Worldwideimporters.com</a></p>
                        <ul class="social-footer2 list-unstyled">
                            <li class=""><a href="https://www.youtube.com/" target="_blank" title="youtube"><img
                                            alt="Youtube" width="30" height="30"></a></li>
                            <li class=""><a href="https://www.facebook.com/" target="_blank" title="Facebook"><img
                                            alt="Facebook" width="30" height="30"></a></li>
                            <li class=""><a href="https://twitter.com" target="_blank" title="Twitter"><img
                                            alt="Twitter" width="30" height="30"></a></li>
                            <li class=""><a href="https://www.instagram.com/" target="_blank" title="instagram"><img
                                            alt="Instagram" width="30" height="30"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright Wide World Importers © 2019. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

