<?php

if (isset($_REQUEST['action']))
{
	$email = htmlspecialchars($_REQUEST['email'],ENT_QUOTES);
	$message = htmlspecialchars($_REQUEST['message'],ENT_QUOTES);
	$name = htmlspecialchars($_REQUEST['name'],ENT_QUOTES);
	$phone = htmlspecialchars($_REQUEST['phone'],ENT_QUOTES);
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	

	$errors = array();

		 		if(empty($name))
				{
					$errors[] = 'You need to enter a name';
				}


		 		if(empty($message))
				{
					$errors[] = 'You need to enter a message';
				}

		 		if(empty($email))
				{
					$errors[] = 'You need to enter an email address';
				}
				//Check if correct email
				if(checkEmail($email) == FALSE)
				{
					$errors[] = 'You did not enter a valid email address';
				}



/*
	require("ralib/autoload.php");
	if (isset($_POST['g-recaptcha-response']))
	{
		$recaptcha = new \ReCaptcha\ReCaptcha(RECAPTCHA_SECRETKEY);
		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		if ($resp->isSuccess() == false)
		{
			$errors[] = 'You did not enter a correct captcha code';
		}
	}
	else
		$errors[] = 'You did not enter a correct captcha code';

*/


	if (empty($errors))
	{

					$to = "jonathan@blockchainminingsolutions.com";
					$subject = "BlockChaninMiningSolutions Form";
					$finalMessage = $message . '
Name: ' . "$name
Email: $email
Phone: $phone
IP: $ip
					";
					$extra = "From: $email\r\nReply-To: $email\r\n";
					mail("$to", "$subject", "$finalMessage", "$extra");


		$email = '';
		$message = '';
		$name = '';
		$sucessMsg = 'We have received your message!';
		
		echo '<html>
		<body><br>
		<b>Thanks we will be in contact</b>
		</body></html>';
		exit;
		
		

	}
	else
	{
		echo '<html>
		<body>';
		
		echo 'The following errors have occurred: ';
		
		foreach($errors as $error)
			echo $error . '<br>' . "\n";
			
			
		
		echo '<br>
		<b>Please go back and fix the issues</b>
		</body></html>';
		exit;
		
	}



}


function checkEmail($email)
{
	return preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/i", $email);  
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlockChain Mining Solutions - Ethereum Bitcoin Siacoin Litecoin</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/main.css" />

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106566666-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-106566666-2');
</script>

</head>
<body id="body">
    <div id="loader" class="loader" data-visible="true">
        <div class="loader__content">
            <img src="./assets/images/logo-icon.svg" class="loader--logo" alt="Loading Icon">
        </div>
    </div>
    <div id="scrollbar">
        <header class="header absolute" data-id="1" id="mobile-header">
            <div class="row">
                <div class="col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
                    <div class="row between-xs eq-height">
                        <div class="header__left">
                            <a href="#" title="BlockChain Mining Solutions">
                                <img src="./assets/images/logo.svg" class="logo" alt="BlockChain Mining Solutions">
                            </a>
                            <button class="burger" aria-label="Toggle navigation" id="js-nav-button">
                                <span class="burger__line"></span>
                            </button>
                        </div>
                        <!-- ./header__left -->
                        <div class="header__right">
                            <ul class="header__nav">
                                <li class="header__nav__item active"><a class="navLink" href="#home">Home</a></li>
                                <li class="header__nav__item"><a class="navLink" href="#about">About</a></li>
                                <li class="header__nav__item"><a class="navLink" href="#services">Services</a></li>
                                <li class="header__nav__item"><a class="navLink" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- ./header__right -->
                    </div>
                </div>
            </div>
        </header>
        <div id="home">
            <section class="hero row" id="hero">
                <div class="hero__cnt col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
                    <article class="white-box row">
                        <div class="white-box__image col-md-10 hide-xs show-md">
                            <img src="https://blockchainminingsolutions.com/assets/images/antminers9.png" class="full-width" alt="">
                            <div class="white-box__image--overlay"></div>
                        </div>
                        <article class="text-box col" data-visible="false">
                            <div class="text-box__bgtext">
                                <span>welcome</span>
                                <div class="text-box__subtitle"><span>/</span> Welcome to Blockchain Mining Solutions</div>
                            </div>
                            <div class="text-box__title col-sm-14 col-md-20"><h1>Cryptocurrency mining solutions</h1></div>
                            <div class="text-box__content col-sm-21">
                                <p>We have built a dedicated facailty to mine cryptocurrency. We generate the coins for various crypto curreincies including Ethereum, Bitcoin, Siacoin and more.</p>
                                <a href="#services" class="navLink button button--default">our services</a>
                            </div>
                        </article>
                        <!-- ./text-box -->
                    </article>
                    <footer class="hero__footer row between-xs">
                        <div class="hero__footer--social">
                            <!--<strong>follow us</strong> 
                            <span class="separator"></span> 
                            <a href="#">facebook</a>
                            <a href="#">twitter</a>
							-->
							</div>
                        <div class="hero__footer--rights">© <?php echo date("Y"); ?> BlockChain Mining Solutions. All Rights Reserved.</div>
                    </footer>
                </div>
                <!-- ./hero__cnt -->
                <div class="hero__bg">
                
                </div>
                <!-- ./hero__bg -->
            </section>
        </div>
        <!-- ./home -->
        <div class="header--wrap">
            <header class="header" data-id="2" data-visible="false">
                <div class="row">
                    <div class="col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
                        <div class="row between-xs eq-height">
                            <div class="header__left">
                                <a href="#" title="BlockChain Mining Solutions">
                                    <img src="./assets/images/logo.svg" class="logo" alt="">
                                </a>
                            </div>
                            <!-- ./header__left -->
                            <div class="header__right">
                                <ul class="header__nav">
                                    <li class="header__nav__item"><a class="navLink" href="#hero">Home</a></li>
                                    <li class="header__nav__item"><a class="navLink" href="#about">About</a></li>
                                    <li class="header__nav__item"><a class="navLink" href="#services">Services</a></li>
                                    <li class="header__nav__item"><a class="navLink" href="#contact">Contact</a></li>
                                </ul>
                            </div>
                            <!-- ./header__right -->
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div id="about">
            <section class="row col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
                <article class="text-box text-box--have-margin" data-visible="false">
                    <div class="text-box__bgtext">
                        <span>about</span>
                        <div class="text-box__subtitle"><span>/</span> about what we do</div>
                    </div>
                    <div class="text-box__title col-sm-12 col-xs-20"><h1>Our focus is crypto currency mining</h1></div>
                    <div class="text-box__content col-md-14 col-xs-24">
                        <p>We are mainly focused on ethereum mining. Each ethereum rig features eight Nvidia 1070 gpus’s that generate around 240 M/HS.</p>
                    </div>
                </article>
                <!-- ./text-box -->
            </section>
            <section class="cover row col-sm-20 col-sm-offset-4">
                <article id="white-stripe" class="white-box">
                    <div class="white-box__title">GET IN TOUCH</div>
                    <div class="white-box__content">
                        <p>To learn more about our offerings please contact us though the contact link</p>
                        <a href="#contact" class="navLink button button--default">contact</a>
                    </div>
                </article>
                <div class="cover__image" style="background-image:url('https://www.ethereum.org/images/assets/1900/Ethereum-homestead-background-34.jpg')"></div>
            </section>
        </div>
        <!-- ./about -->
        <div id="services">
            <section class="row col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
                <article class="text-box text-box--have-margin" data-visible="false">
                    <div class="text-box__bgtext">
                        <span>services</span>
                        <div class="text-box__subtitle"><span>/</span> our services</div>
                    </div>
                    <div class="text-box__title col-sm-12 col-xs-20"><h1>Cryptocurrency mining mainly focused on ethereum</h1></div>
                    <div class="text-box__content col-sm-16 col-xs-24">
                        <p>We are able to work with any of the minable crypto currencies and have can also offer custom software development as well</p>
                    </div>
                </article>
                <!-- ./text-box -->
            </section>
            <section class="row">
                <article class="service col-sm-4 col-xs-20 col-sm-offset-6 col-xs-offset-2" data-visible="false">
                    <div class="service__nb" data-id="1">0<span>0</span></div>
                    <div class="service__title">Ethereum Mining</div>
                    <div class="service__border"></div>
                    <div class="service__content">We have custom built mining rigs built to generate Ethereum in a cost effective way</div>
                </article>
                <!-- ./service -->
                <article class="service col-sm-4 col-xs-20 col-sm-offset-2 col-xs-offset-2" data-visible="false">
                    <div class="service__nb" data-id="2">0<span>0</span></div>
                    <div class="service__title">Bitcoin mining</div>
                    <div class="service__border"></div>
                    <div class="service__content">Using the Antminers from Bitmain we are able to mine Bitcoin</div>
                </article>
                <!-- ./service -->
                <article class="service col-sm-4 col-xs-20 col-sm-offset-2 col-xs-offset-2" data-visible="false">
                    <div class="service__nb" data-id="3">0<span>0</span></div>
                    <div class="service__title">Siacoin Mining</div>
                    <div class="service__border"></div>
                    <div class="service__content">We mine Siacoin using Bitmain A3 Antminer's.</div>
                </article>
                <!-- ./service -->
                <article class="service col-sm-4 col-xs-20 col-sm-offset-6 col-xs-offset-2" data-visible="false">
                    <div class="service__nb" data-id="4">0<span>0</span></div>
                    <div class="service__title">Miner Hosting</div>
                    <div class="service__border"></div>
                    <div class="service__content">If you have own cryptocurrency mining equipment we can host it inside our secure facility. We have ample power at 240 volts. To find out more please contact us</div>
                </article>
                <!-- ./service -->
                <article class="service col-sm-4 col-xs-20 col-sm-offset-2 col-xs-offset-2" data-visible="false">
                    <div class="service__nb" data-id="5">0<span>0</span></div>
                    <div class="service__title">Blockchain Software</div>
                    <div class="service__border"></div>
                    <div class="service__content">We can develop custom software for cryptocurrency, blockcahin, and more!</div>
                </article>
                <!-- ./service -->
            </section>
        </div>
        <!-- ./services -->
        <section id="contact" class="row col-sm-20 col-xs-20 col-sm-offset-2 col-xs-offset-2">
            <article class="text-box text-box--have-margin" data-visible="false">
                <div class="text-box__bgtext">
                    <span>contact</span>
                    <div class="text-box__subtitle"><span>/</span> get in touch</div>
                </div>
                <div class="text-box__title col-sm-10 col-xs-20"><h1>Want to learn more or have a question?</h1></div>
                <div class="text-box__content col-lg-12 col-md-16 col-xs-24">
                    <p>For more inofrmation please fill out the form below. We will reply within one business day.</p>
                </div>
            </article>
            <!-- ./text-box -->
        </section>
        <div class="form-box col-lg-7 col-md-20 col-xs-20 col-md-offset-2 col-xs-offset-2">
            <article class="white-box">
                <div class="white-box__content">
                    <form action="index.php?action=contact" method="post">
                        <div class="form-box--group">
                            <label for="first_name" class="label">Name</label>
                            <input id="first_name" name="name" type="text" class="form--control" placeholder="Enter your name">
                        </div>
                        <!-- ./form-box--group -->
                
                        <div class="form-box--group">
                            <label for="email" class="label">Email</label>
                            <input id="email" name="email" type="email" class="form--control" placeholder="Enter your email address">
                        </div>
                        <!-- ./form-box--group -->
                    	<!--  <div class="form-box--group error"> -->
                        
                        <div class="form-box--group">
                            <label for="phone" class="label">Phone</label>
                            <input id="phone" name="phone" type="tel" class="form--control" placeholder="Enter your phone number">
                        </div>
                        <!-- ./form-box--group -->
                        <div class="form-box--group full-width">
                            <label for="message" class="label">Message</label>
                            <textarea id="message" name="message" class="form--control" placeholder="Type your message here ..."></textarea>
                        </div>
                        <!-- ./form-box--group -->
                        
                        <!--
						<div class="form-box--errors"><span>Some error messages goes here ...</span></div>-->
                        
                        <!-- ./form-box--errors -->
                        <div class="form-box--buttons">
                            <button type="submit" class="button button--default">send</button>
                        </div>
                        <!-- ./form-box--button -->
                    </form>
                </div>
            </article>
        </div>
        <!-- ./form-box -->
        <div class="row col-sm-10 col-xs-20 col-sm-offset-2 col-xs-offset-2">
            <footer class="footer">
                <img src="./assets/images/logo.svg" class="logo" alt="BlockChain Mining Solutions Logo">
                <div class="copyright">© <?php echo date("Y"); ?> BlockChain Mining Solutions. <span>All Rights Reserved.</span></div>
            </footer>
        </div>
    </div>
    <!-- ./scrollbar -->

    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-menu__content">
            <ul class="mobile-menu__nav">
                <li class="mobile-menu__nav__item">
                    <a class="navLink" href="#hero">Home</a>
                </li>
                <li class="mobile-menu__nav__item">
                    <a class="navLink" href="#about">About</a>
                </li>
                <li class="mobile-menu__nav__item">
                    <a class="navLink" href="#services">Services</a>
                </li>
                <li class="mobile-menu__nav__item">
                    <a class="navLink" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./mobile-menu -->


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="./js/vendor/smooth-scrollbar.js"></script>

    <script src="./js/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/CSSPlugin.min.js"></script>
    <script src="./js/SplitText.min.js"></script>
    <script src="./js/ModifiersPlugin-latest-beta.js"></script>

    <script src="./js/script.min.js"></script>
</body>
</html>
