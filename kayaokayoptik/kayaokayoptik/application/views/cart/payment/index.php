<!DOCTYPE html>
<html lang="tr" class="html">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie-edge"/>
    <meta name="keywords" content="Yulian Brito, Yulian, Brito, Yulian Developer, Frontend Developer, Credit Card 1"/>
    <meta name="author" content="Yulian Brito"/>
    <title><?= get_settings()->title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Quicksand:400,700|Open+Sans|PT+Mono"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Overpass+Mono"/>
<style>
    /* ===========================
    General Styles
============================ */

    *, :after, :before{
        box-sizing: border-box;
    }

    .html{
        font-size: 10px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 400;
    }

    .body{
        padding: 0;
        margin: 0;
        background: #dddfe6;
    }

    .container__h1{
        margin: 0;
        line-height: 2.8;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -2px;
        color: #594b45;
        text-align: center;
    }

    .container__h1--h2{
        line-height: 1.4;
        font-size: 11px;
        color: #808080;
        letter-spacing: 1px;
        text-align: left;
        text-transform: uppercase;
    }

    .container__h3{
        margin: 0;
        font-family: 'PT Mono';
        word-spacing: -3px;
        font-size: 18px;
        font-weight: 400;
        color: #594b45;
        letter-spacing: 0;
        text-align: left;
        text-transform: uppercase;
        line-height: 1.8;
    }

    /* ===========================
        Card
    ============================ */

    .container{
        width: 390px;
        height: 530px;
        position: absolute;
        top: 50%;
        left: 50%;
        background: #e6e6e6;
        overflow: hidden;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-border-radius: 9px;
        border-radius: 9px;
        -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.09), 0 6px 6px rgba(0, 0, 0, 0.13);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.09), 0 6px 6px rgba(0, 0, 0, 0.13);
    }

    .payment{
        z-index: 0;
        width: 370px;
        position: relative;
        margin: 0 auto;
        text-align: center;
    }

    .card{
        width: 300px;
        height: 178px;
        position: relative;
        margin: 0 auto;
        margin-bottom: 5px;
        background-image: linear-gradient(to bottom left, #ffecc7, #d0b978);
        overflow: hidden;
        z-index: 5;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 15px 24px rgba(37,44,65,0.32);
        box-shadow: 0 15px 24px rgba(37,44,65,0.32);
    }

    .card-content{
        width: 100%;
        padding: 20px;
        position: relative;
        z-index: 5;
    }

    .logo-visa{
        position: relative;
        margin-top: -20px;
        left: 184px;
        height: 70px;
        width: 80px;
    }

    .card__flag{
        position: absolute;
        left: 5px;
        top: 30%;
        width: 40px;
        height: 40px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background: #ce0e1d;
    }

    .card__flag--yellow{
        left: auto;
        right: 5px;
        background: #e39833;
    }

    .card__flag--yellow::after{
        content: "MasterCard";
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-46.5px, -7px);
        transform: translate(-46.5px, -7px);
        font-size: 11.2px;
        font-family: "Raleway", sans-serif;
        font-style: italic;
        font-weight: 800;
        color: #fff;
        filter: drop-shadow(1px 1px 1px rgba(0, 0, 0, 0.5));
    }

    .card__cvc-1{
        margin-left: 87px;
    }

    .card__exp-month{
        width:18px;
        display: inline-block;
    }

    .card__exp-year{
        width:18px;
        display: inline-block;
    }

    .card__cvc-2{
        margin-left: 90px;
    }

    .wrong-entry {
        -webkit-animation: wrong-log .45ss;
        animation: wrong-log .45s;
    }

    @-webkit-keyframes wrong-log {
        0%, 100% {
            left: 0px;
        }
        20% , 60% {
            left: 15px;
        }
        40% , 80% {
            left: -15px;
        }
    }

    @keyframes wrong-log {
        0%, 100% {
            left: 0px;
        }
        20% , 60% {
            left: 15px;
        }
        40% , 80% {
            left: -15px;
        }
    }

    /* ===========================
        Card Form
    ============================ */

    .card-form{
        width: 100%;
        position: relative;
        padding: 15px 35px;
    }

    .field{
        height: 45px;
        margin-top: 16px;
        padding: 2px 10px;
        margin-bottom: 2px;
        background: #f4f5f9;
        border: 1px solid #d0d0df;
        display: inline-block;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: inset 0 0 0 1.5px #d0d0df, rgba(32, 32, 72, 0.12);
        box-shadow: inset 0 0 0 1.5px #d0d0df, rgba(32, 32, 72, 0.12);
        -webkit-transition: box-shadow 0.2s;
        transition: box-shadow 0.2s;
    }

    .field:focus-within{
        -webkit-box-shadow: inset 0 0 0 1.5px #3d6df9, 0 1px 3px rgba(61, 109, 249, 0.25);
        box-shadow: inset 0 0 0 1.5px #3d6df9, 0 1px 3px rgba(61, 109, 249, 0.25);
        -webkit-transition: box-shadow 0.2s;
        transition: box-shadow 0.2s;
    }

    .field:hover .field__input::placeholder{
        color: #babac9;
    }

    .card-icon{
        position: relative;
        top: 6.9px;
        z-index: 5;
    }

    .field__input{
        height: 30px;
        width: 241px;
        position: relative;
        padding: 0px 10px 0px 6px;
        background: transparent;
        border: none;
        color: #818190;
        font-family: 'PT Mono';
        font-size: 18px;
        font-weight: 400;
        z-index: 0;
        outline: none;
    }

    .field__input::placeholder{
        color: #c9c9d9;
        -webkit-transition: color 0.9s;
        transition: color 0.9s;
    }

    .field--space{
        margin-right: 6px;
    }

    .field__input--cardexp-1{
        width: 43px;
        padding: 0px 0px 0px 6px;
    }

    .field__input--cardexp-2{
        width: 43px;
        padding: 0px 0px 0px 6px;
    }

    .field__input--cardcvc{
        width: 60px;
    }

    .button{
        margin: 20px auto;
        margin-bottom: 40px;
        padding: 16px 32px;
        font-family: 'Roboto';
        font-weight: 500;
        line-height: 16px;
        width: 100%;
        cursor: pointer;
        border: none;
        -webkit-border-radius: 24px;
        border-radius: 24px;
        outline: none;
        text-decoration: none;
        font-size: 18px;
        letter-spacing: .5px;
        background: #212327;
        color: #fff;
        -webkit-box-shadow: 0 2px 8px -1px rgba(21, 25, 36, 0.32);
        box-shadow: 0 2px 8px -1px rgba(21, 25, 36, 0.32);
        -webkit-transition: box-shadow .44s ease, -webkit-transform .44s ease;
        transition: box-shadow .44s ease, -webkit-transform .44s ease;
        transition: transform .44s ease, box-shadow .44s ease;
    }

    .button:hover{
        -webkit-transform: translateY(-4px);
        transform: translateY(var(-4px));
        -webkit-box-shadow: 0 4px 20px -2px rgba(21, 25, 36, 0.5);
        box-shadow: 0 4px 20px -2px rgba(21, 25, 36, 0.5);
    }

    /* ===========================
        Responsive
    ============================ */

    @media (max-height: 599px){
        .body{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
            position: relative;
        }

        .container{
            top:0;
            left:0;
            right:0;
            bottom: 0;
            position: relative;
            margin: 1rem auto;
            -webkit-transform: none;
            transform: none;
        }
    }

    @media (max-width: 400px){
        .body{
            background: #e6e6e6;
        }

        .container{
            width: 340px;
            border: none;
            background: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .container__h3{
            line-height: 1.5;
        }

        .payment{
            width: 285px;
        }

        .card{
            width: 285px;
            height: 169px;
        }

        .logo-visa{
            left: 174.8px;
        }

        .card-form{
            padding: 15px 0px;
        }

        .field{
            text-align: left;
            display:block;
        }

        .field__input{
            width: 223px;
        }

        .field--space{
            margin-right:0;
        }

        .field__input--cardexp-1{
            width: 86px;
        }

        .field__input--cardexp-2{
            width: 86px;
        }
    }
    </style>
</head>
<body class="body">
<section class="container">
    <h1 class="container__h1">Kart Bilgileri</h1>
    <div class="payment">
        <div id="card-shake" class="card">
            <div class="card-content">
                <div class="logo-visa">
                    <div class="card__flag"></div>
                    <div class="card__flag card__flag--yellow"></div>
                </div>
                <h2 class="container__h1 container__h1--h2">Kart Numarası</h2>
                <h3 class="container__h3">
                    <div class="card-number">
                        <span class="card__span">0000 0000 0000 0000</span>
                    </div>
                </h3>
                <h2 class="container__h1 container__h1--h2">Tarih<span class="card__cvc-1" style="margin-left: 120px">CVC</span></h2>
                <h3 class="container__h3">
              <span class="card__exp-month">
                <span class="card__span">
                  00
                </span>
              </span>
                    <span class="e-divider">
                <span>
                   /
                </span>
              </span>
                    <span class="card__exp-year">
                <span class="card__span">
                   00
                </span>
              </span>
                    <span class="card__cvc-2">
                <span class="card__span">000</span>
              </span>
                </h3>
            </div>
        </div>
        <form class="card-form" action="<?= base_url("cart/confirmation") ?>" method="post">
            <div  class="field">
                <svg version="1.1" class="card-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
              <g transform="translate(1 1)">
                  <path style="fill:#f4f5f9;" d="M475.16,434.2H34.84c-15.36,0-27.307-11.947-27.307-27.307V103.107
                   C7.533,87.747,19.48,75.8,34.84,75.8h440.32c15.36,0,27.307,11.947,27.307,27.307v303.787
                   C502.467,422.253,490.52,434.2,475.16,434.2L475.16,434.2z"/>
                  <path style="fill:#c9c9d9;" d="M475.16,442.733H34.84C15.213,442.733-1,426.52-1,406.893V103.107
                   c0-19.627,16.213-35.84,35.84-35.84h440.32c19.627,0,35.84,16.213,35.84,35.84v303.787C511,426.52,494.787,442.733,475.16,442.733z
                    M34.84,84.333c-10.24,0-18.773,8.533-18.773,18.773v303.787c0,10.24,8.533,18.773,18.773,18.773h440.32
                   c10.24,0,18.773-8.533,18.773-18.773V103.107c0-10.24-8.533-18.773-18.773-18.773H34.84z"/>
                  <path style="fill:#f4f5f9;" d="M400.067,178.2c0,28.16-23.04,51.2-51.2,51.2c-28.16,0-51.2-23.04-51.2-51.2s23.04-51.2,51.2-51.2
                   C377.027,127,400.067,150.04,400.067,178.2L400.067,178.2z"/>
                  <path style="fill:#c9c9d9;" d="M348.867,237.933c-33.28,0-59.733-26.453-59.733-59.733s26.453-59.733,59.733-59.733
                   S408.6,144.92,408.6,178.2S382.147,237.933,348.867,237.933z M348.867,135.533c-23.893,0-42.667,18.773-42.667,42.667
                   s18.773,42.667,42.667,42.667c23.893,0,42.667-18.773,42.667-42.667S372.76,135.533,348.867,135.533z"/>
                  <path style="fill:#f4f5f9;" d="M459.8,178.2c0,28.16-23.04,51.2-51.2,51.2c-28.16,0-51.2-23.04-51.2-51.2s23.04-51.2,51.2-51.2
                   C436.76,127,459.8,150.04,459.8,178.2L459.8,178.2z"/>
                  <g>
                      <path style="fill:#c9c9d9;" d="M408.6,237.933c-33.28,0-59.733-26.453-59.733-59.733s26.453-59.733,59.733-59.733
                     s59.733,26.453,59.733,59.733S441.88,237.933,408.6,237.933z M408.6,135.533c-23.893,0-42.667,18.773-42.667,42.667
                     s18.773,42.667,42.667,42.667c23.893,0,42.667-18.773,42.667-42.667S432.493,135.533,408.6,135.533z"/>
                      <path style="fill:#c9c9d9;" d="M203.8,195.267h-17.067c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533H203.8
                     c5.12,0,8.533,3.413,8.533,8.533C212.333,191.853,208.92,195.267,203.8,195.267z M152.6,195.267h-8.533
                     c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533
                     C161.133,191.853,157.72,195.267,152.6,195.267z M109.933,195.267H92.867c-5.12,0-8.533-3.413-8.533-8.533
                     c0-5.12,3.413-8.533,8.533-8.533h17.067c5.12,0,8.533,3.413,8.533,8.533C118.467,191.853,115.053,195.267,109.933,195.267z
                      M58.733,195.267H50.2c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533
                     C67.267,191.853,63.853,195.267,58.733,195.267z M237.933,152.6h-76.8c-5.12,0-8.533-3.413-8.533-8.533
                     c0-5.12,3.413-8.533,8.533-8.533h76.8c5.12,0,8.533,3.413,8.533,8.533C246.467,149.187,243.053,152.6,237.933,152.6z M127,152.6
                     H50.2c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533H127c5.12,0,8.533,3.413,8.533,8.533
                     C135.533,149.187,132.12,152.6,127,152.6z"/>
                  </g>
                  <polygon style="fill:#c9c9d9" points="50.2,323.267 127,323.267 127,374.467 50.2,374.467"/>
                  <path style="fill:#c9c9d9;" d="M135.533,383H41.667v-68.267h93.867V383z M58.733,365.933h59.733V331.8H58.733V365.933z"/>
                  <polygon style="fill:#c9c9d9" points="161.133,323.267 237.933,323.267 237.933,374.467 161.133,374.467"/>
                  <path style="fill:#c9c9d9;" d="M246.467,383H152.6v-68.267h93.867V383z M169.667,365.933H229.4V331.8h-59.733V365.933z"/>
                  <polygon style="fill:#c9c9d9" points="272.067,323.267 348.867,323.267 348.867,374.467 272.067,374.467"/>
                  <path style="fill:#c9c9d9;" d="M357.4,383h-93.867v-68.267H357.4V383z M280.6,365.933h59.733V331.8H280.6V365.933z"/>
                  <polygon style="fill:#c9c9d9;" points="383,323.267 459.8,323.267 459.8,374.467 383,374.467"/>
                  <path style="fill:#c9c9d9;" d="M468.333,383h-93.867v-68.267h93.867V383z M391.533,365.933h59.733V331.8h-59.733V365.933z"/>
              </g>
            </svg>
                <input required id="card-number" class="field__input" type='tel' name='card-number' placeholder='1234 5678 9123 4567' maxlength="20"/>
            </div>
            <div class="field field--space">
                <svg version="1.1" class="card-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 600.112 600.111" style="enable-background:new 0 0 600.112 600.111;" xml:space="preserve">
              <g>
                  <g>
                      <g>
                          <path style="fill:#c9c9d9;" d="M537.423,52.563h-59.836V21.92c0-11.83-9.591-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H165.364V21.92
                     c0-11.83-9.59-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H62.687c-32.058,0-58.14,26.082-58.14,58.14v430.77
                     c0,32.059,26.082,58.139,58.14,58.139h474.736c32.059,0,58.141-26.08,58.141-58.139v-430.77
                     C595.564,78.645,569.482,52.563,537.423,52.563z M47.387,110.703c0-8.451,6.85-15.3,15.3-15.3h59.837v24.443
                     c0,11.83,9.59,21.42,21.42,21.42s21.42-9.59,21.42-21.42V95.403h269.383v24.443c0,11.83,9.59,21.42,21.42,21.42
                     c11.829,0,21.42-9.59,21.42-21.42V95.403h59.836c8.45,0,15.3,6.85,15.3,15.3v53.856H47.387V110.703z M552.723,541.473
                     c0,8.449-6.85,15.301-15.3,15.301H62.687c-8.45,0-15.3-6.852-15.3-15.301V207.399h505.336V541.473z"/>
                          <path style="fill:#c9c9d9;" d="M537.423,600.111H62.687c-32.334,0-58.64-26.306-58.64-58.639v-430.77c0-32.334,26.306-58.64,58.64-58.64h59.336V21.92
                     c0-12.087,9.833-21.92,21.92-21.92c12.086,0,21.92,9.833,21.92,21.92v30.142h268.384V21.92c0-12.087,9.833-21.92,21.92-21.92
                     s21.92,9.833,21.92,21.92v30.143h59.336c32.335,0,58.641,26.306,58.641,58.64v430.77
                     C596.064,573.806,569.758,600.111,537.423,600.111z M62.687,53.062c-31.783,0-57.64,25.857-57.64,57.64v430.77
                     c0,31.782,25.857,57.639,57.64,57.639h474.736c31.783,0,57.641-25.856,57.641-57.639v-430.77c0-31.783-25.857-57.64-57.641-57.64
                     h-60.336V21.92c0-11.536-9.385-20.92-20.92-20.92s-20.92,9.385-20.92,20.92v31.142H164.864V21.92
                     c0-11.536-9.385-20.92-20.92-20.92c-11.536,0-20.92,9.385-20.92,20.92v31.142H62.687z M537.423,557.273H62.687
                     c-8.712,0-15.8-7.088-15.8-15.801V206.899h506.336v334.574C553.223,550.186,546.135,557.273,537.423,557.273z M47.887,207.899
                     v333.574c0,8.161,6.639,14.801,14.8,14.801h474.736c8.16,0,14.8-6.64,14.8-14.801V207.899H47.887z M553.223,165.059H46.887
                     v-54.356c0-8.712,7.088-15.8,15.8-15.8h60.337v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h270.383
                     v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h60.336c8.712,0,15.8,7.088,15.8,15.8V165.059z
                      M47.887,164.059h504.336v-53.356c0-8.161-6.64-14.8-14.8-14.8h-59.336v23.943c0,12.087-9.833,21.92-21.92,21.92
                     s-21.92-9.833-21.92-21.92V95.903H165.864v23.943c0,12.087-9.833,21.92-21.92,21.92s-21.92-9.833-21.92-21.92V95.903H62.687
                     c-8.161,0-14.8,6.639-14.8,14.8V164.059z"/>
                      </g>
                  </g>
              </g>
            </svg>
                <input required id="expires-month" class="field__input field__input--cardexp-1" type="tel" name="expires-month" placeholder="MM" allowed-pattern="[0-9]"  maxlength="2"/>
                <svg version="1.1" class="card-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 600.112 600.111" style="enable-background:new 0 0 600.112 600.111;" xml:space="preserve">
              <g>
                  <g>
                      <g>
                          <path style="fill:#c9c9d9;" d="M537.423,52.563h-59.836V21.92c0-11.83-9.591-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H165.364V21.92
                    c0-11.83-9.59-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H62.687c-32.058,0-58.14,26.082-58.14,58.14v430.77
                    c0,32.059,26.082,58.139,58.14,58.139h474.736c32.059,0,58.141-26.08,58.141-58.139v-430.77
                    C595.564,78.645,569.482,52.563,537.423,52.563z M47.387,110.703c0-8.451,6.85-15.3,15.3-15.3h59.837v24.443
                    c0,11.83,9.59,21.42,21.42,21.42s21.42-9.59,21.42-21.42V95.403h269.383v24.443c0,11.83,9.59,21.42,21.42,21.42
                    c11.829,0,21.42-9.59,21.42-21.42V95.403h59.836c8.45,0,15.3,6.85,15.3,15.3v53.856H47.387V110.703z M552.723,541.473
                    c0,8.449-6.85,15.301-15.3,15.301H62.687c-8.45,0-15.3-6.852-15.3-15.301V207.399h505.336V541.473z"/>
                          <path style="fill:#c9c9d9;" d="M537.423,600.111H62.687c-32.334,0-58.64-26.306-58.64-58.639v-430.77c0-32.334,26.306-58.64,58.64-58.64h59.336V21.92
                    c0-12.087,9.833-21.92,21.92-21.92c12.086,0,21.92,9.833,21.92,21.92v30.142h268.384V21.92c0-12.087,9.833-21.92,21.92-21.92
                    s21.92,9.833,21.92,21.92v30.143h59.336c32.335,0,58.641,26.306,58.641,58.64v430.77
                    C596.064,573.806,569.758,600.111,537.423,600.111z M62.687,53.062c-31.783,0-57.64,25.857-57.64,57.64v430.77
                    c0,31.782,25.857,57.639,57.64,57.639h474.736c31.783,0,57.641-25.856,57.641-57.639v-430.77c0-31.783-25.857-57.64-57.641-57.64
                    h-60.336V21.92c0-11.536-9.385-20.92-20.92-20.92s-20.92,9.385-20.92,20.92v31.142H164.864V21.92
                    c0-11.536-9.385-20.92-20.92-20.92c-11.536,0-20.92,9.385-20.92,20.92v31.142H62.687z M537.423,557.273H62.687
                    c-8.712,0-15.8-7.088-15.8-15.801V206.899h506.336v334.574C553.223,550.186,546.135,557.273,537.423,557.273z M47.887,207.899
                    v333.574c0,8.161,6.639,14.801,14.8,14.801h474.736c8.16,0,14.8-6.64,14.8-14.801V207.899H47.887z M553.223,165.059H46.887
                    v-54.356c0-8.712,7.088-15.8,15.8-15.8h60.337v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h270.383
                    v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h60.336c8.712,0,15.8,7.088,15.8,15.8V165.059z
                    M47.887,164.059h504.336v-53.356c0-8.161-6.64-14.8-14.8-14.8h-59.336v23.943c0,12.087-9.833,21.92-21.92,21.92
                    s-21.92-9.833-21.92-21.92V95.903H165.864v23.943c0,12.087-9.833,21.92-21.92,21.92s-21.92-9.833-21.92-21.92V95.903H62.687
                    c-8.161,0-14.8,6.639-14.8,14.8V164.059z"/>
                      </g>
                  </g>
              </g>
            </svg>
                <input required id="expires-year" class="field__input field__input--cardexp-2" type="tel" name="expires-year" placeholder="YY" allowed-pattern="[0-9]" maxlength="2"/>
            </div>
            <div class="field">
                <svg version="1.1" class="card-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
              <g transform="translate(1 1)">
                  <path style="fill:#f4f5f9;" d="M475.16,434.2H34.84c-15.36,0-27.307-11.947-27.307-27.307V103.107
		            C7.533,87.747,19.48,75.8,34.84,75.8h440.32c15.36,0,27.307,11.947,27.307,27.307v303.787
		            C502.467,422.253,490.52,434.2,475.16,434.2L475.16,434.2z"/>
                  <path style="fill:#c9c9d9;" d="M475.16,442.733H34.84C15.213,442.733-1,426.52-1,406.893V103.107
		            c0-19.627,16.213-35.84,35.84-35.84h440.32c19.627,0,35.84,16.213,35.84,35.84v303.787C511,426.52,494.787,442.733,475.16,442.733z
		            M34.84,84.333c-10.24,0-18.773,8.533-18.773,18.773v303.787c0,10.24,8.533,18.773,18.773,18.773h440.32
		            c10.24,0,18.773-8.533,18.773-18.773V103.107c0-10.24-8.533-18.773-18.773-18.773H34.84z"/>
                  <polygon style="fill:#c9c9d9;" points="7.533,118.467 502.467,118.467 502.467,186.733 7.533,186.733"/>
                  <g>
                      <path style="fill:#c9c9d9;" d="M511,195.267H-1v-85.333h512V195.267z M16.067,178.2h477.867V127H16.067V178.2z"/>
                      <path style="fill:#c9c9d9;" d="M212.333,289.133h-17.067c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h17.067
			            c5.12,0,8.533,3.413,8.533,8.533C220.867,285.72,217.453,289.133,212.333,289.133z M161.133,289.133H152.6
			            c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533
		            	C169.667,285.72,166.253,289.133,161.133,289.133z M118.467,289.133H101.4c-5.12,0-8.533-3.413-8.533-8.533
		            	c0-5.12,3.413-8.533,8.533-8.533h17.067c5.12,0,8.533,3.413,8.533,8.533C127,285.72,123.587,289.133,118.467,289.133z
		          	  M67.267,289.133h-8.533c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533
			            C75.8,285.72,72.387,289.133,67.267,289.133z M246.467,246.467h-76.8c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533h76.8c5.12,0,8.533,3.413,8.533,8.533C255,243.053,251.587,246.467,246.467,246.467z
			            M135.533,246.467h-76.8c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h76.8c5.12,0,8.533,3.413,8.533,8.533
			            C144.067,243.053,140.653,246.467,135.533,246.467z"/>
                      <path style="fill:#c9c9d9;" d="M212.333,152.6c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C208.92,144.067,212.333,147.48,212.333,152.6"/>
                      <path style="fill:#c9c9d9;" d="M237.933,127c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            s3.413-8.533,8.533-8.533C234.52,118.467,237.933,121.88,237.933,127"/>
                      <path style="fill:#c9c9d9;" d="M237.933,178.2c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
		            	c0-5.12,3.413-8.533,8.533-8.533C234.52,169.667,237.933,173.08,237.933,178.2"/>
                      <path style="fill:#c9c9d9;" d="M263.533,152.6c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
		            	c0-5.12,3.413-8.533,8.533-8.533S263.533,147.48,263.533,152.6"/>
                      <path style="fill:#c9c9d9;" d="M161.133,152.6c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C157.72,144.067,161.133,147.48,161.133,152.6"/>
                      <path style="fill:#c9c9d9;" d="M186.733,127c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
		            	s3.413-8.533,8.533-8.533C183.32,118.467,186.733,121.88,186.733,127"/>
                      <path style="fill:#c9c9d9;" d="M186.733,178.2c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C183.32,169.667,186.733,173.08,186.733,178.2"/>
                      <path style="fill:#c9c9d9;" d="M33.133,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            S33.133,121.88,33.133,127"/>
                      <path style="fill:#c9c9d9;" d="M33.133,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S33.133,173.08,33.133,178.2"/>
                      <path style="fill:#c9c9d9;" d="M58.733,152.6c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S58.733,147.48,58.733,152.6"/>
                      <path style="fill:#c9c9d9;" d="M109.933,152.6c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C106.52,144.067,109.933,147.48,109.933,152.6"/>
                      <path style="fill:#c9c9d9;" d="M84.333,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            C80.92,118.467,84.333,121.88,84.333,127"/>
                      <path style="fill:#c9c9d9;" d="M135.533,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            S135.533,121.88,135.533,127"/>
                      <path style="fill:#c9c9d9;" d="M84.333,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C80.92,169.667,84.333,173.08,84.333,178.2"/>
                      <path style="fill:#c9c9d9;" d="M135.533,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S135.533,173.08,135.533,178.2"/>
                      <path style="fill:#c9c9d9;" d="M468.333,152.6c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S468.333,147.48,468.333,152.6"/>
                      <path style="fill:#c9c9d9;" d="M493.933,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            S493.933,121.88,493.933,127"/>
                      <path style="fill:#c9c9d9;" d="M493.933,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S493.933,173.08,493.933,178.2"/>
                      <path style="fill:#c9c9d9;" d="M417.133,152.6c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C413.72,144.067,417.133,147.48,417.133,152.6"/>
                      <path style="fill:#c9c9d9;" d="M442.733,127c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            s3.413-8.533,8.533-8.533C439.32,118.467,442.733,121.88,442.733,127"/>
                      <path style="fill:#c9c9d9;" d="M442.733,178.2c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C439.32,169.667,442.733,173.08,442.733,178.2"/>
                      <path style="fill:#c9c9d9;" d="M289.133,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            S289.133,121.88,289.133,127"/>
                      <path style="fill:#c9c9d9;" d="M289.133,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S289.133,173.08,289.133,178.2"/>
                      <path style="fill:#c9c9d9;" d="M314.733,152.6c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S314.733,147.48,314.733,152.6"/>
                      <path style="fill:#c9c9d9;" d="M365.933,152.6c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533S365.933,147.48,365.933,152.6"/>
                      <path style="fill:#c9c9d9;" d="M340.333,127c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533
			            S340.333,121.88,340.333,127"/>
                      <path style="fill:#c9c9d9;" d="M391.533,127c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            s3.413-8.533,8.533-8.533C388.12,118.467,391.533,121.88,391.533,127"/>
                      <path style="fill:#c9c9d9;" d="M340.333,178.2c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533
		            	c0-5.12,3.413-8.533,8.533-8.533S340.333,173.08,340.333,178.2"/>
                      <path style="fill:#c9c9d9;" d="M391.533,178.2c0,5.12-3.413,8.533-8.533,8.533c-5.12,0-8.533-3.413-8.533-8.533
			            c0-5.12,3.413-8.533,8.533-8.533C388.12,169.667,391.533,173.08,391.533,178.2"/>
                  </g>
                  <path style="fill:#f4f5f9;" d="M400.067,340.333c0,28.16-23.04,51.2-51.2,51.2c-28.16,0-51.2-23.04-51.2-51.2
		            c0-28.16,23.04-51.2,51.2-51.2C377.027,289.133,400.067,312.173,400.067,340.333L400.067,340.333z"/>
                  <path style="fill:#c9c9d9;" d="M348.867,400.067c-33.28,0-59.733-26.453-59.733-59.733s26.453-59.733,59.733-59.733
		            s59.733,26.453,59.733,59.733S382.147,400.067,348.867,400.067z M348.867,297.667c-23.893,0-42.667,18.773-42.667,42.667
		            c0,23.893,18.773,42.667,42.667,42.667c23.893,0,42.667-18.773,42.667-42.667C391.533,316.44,372.76,297.667,348.867,297.667z"/>
                  <path style="fill:#f4f5f9;" d="M459.8,340.333c0,28.16-23.04,51.2-51.2,51.2c-28.16,0-51.2-23.04-51.2-51.2
		            c0-28.16,23.04-51.2,51.2-51.2C436.76,289.133,459.8,312.173,459.8,340.333L459.8,340.333z"/>
                  <path style="fill:#c9c9d9;" d="M408.6,400.067c-33.28,0-59.733-26.453-59.733-59.733S375.32,280.6,408.6,280.6
		            s59.733,26.453,59.733,59.733S441.88,400.067,408.6,400.067z M408.6,297.667c-23.893,0-42.667,18.773-42.667,42.667
		            c0,23.893,18.773,42.667,42.667,42.667c23.893,0,42.667-18.773,42.667-42.667C451.267,316.44,432.493,297.667,408.6,297.667z"/>
              </g>
            </svg>
                <input   required id="card-cvc" class="field__input field__input--cardcvc" type="tel" name="cardcvc" placeholder="123" maxlength="3" autocomplete="off"/>
            </div>
            <button class="button" type="submit">Onayla</button>
        </form>
    </div>
</section>
<script>

    window.addEventListener("load",start)

    function start (){
        const d = document,
            cShake = document.getElementById("card-shake"),
            ccForm = d.querySelector(".card-form"),
            cNumber = d.querySelectorAll(".card-number"),
            ccNumber = ccForm.querySelector("#card-number"),
            ccMonth = ccForm.querySelector("#expires-month"),
            cMonth = d.querySelectorAll(".card__exp-month"),
            ccYear = ccForm.querySelector("#expires-year"),
            cYear = d.querySelectorAll(".card__exp-year"),
            ccCCV = ccForm.querySelector("#card-cvc"),
            cCCV = d.querySelectorAll(".card__cvc-2"),
            defaultNumberN = cNumber[0].querySelectorAll(".card__span")[0].innerHTML,
            defaultNumberM = cMonth[0].querySelectorAll(".card__span")[0].innerHTML,
            defaultNumberY = cYear[0].querySelectorAll(".card__span")[0].innerHTML,
            defaultNumberC = cCCV[0].querySelectorAll(".card__span")[0].innerHTML

        payment()

        function payment (ev){
            ev = ev || window.event

            let cardNumber, cardCCV
            addEvent(ccNumber, "focus", function (){
                cShake.classList.add("wrong-entry")
            })
            addEvent(ccNumber, "blur", function (){
                cShake.classList.remove("wrong-entry")
            })

            addEvent(ccMonth, "focus", function (){
                cShake.classList.add("wrong-entry")
            })
            addEvent(ccMonth, "blur", function (){
                cShake.classList.remove("wrong-entry")
            })

            addEvent(ccYear, "focus", function (){
                cShake.classList.add("wrong-entry")
            })
            addEvent(ccYear, "blur", function (){
                cShake.classList.remove("wrong-entry")
            })

            addEvent(ccCCV, "focus", function (){
                cShake.classList.add("wrong-entry")
            })
            addEvent(ccCCV, "blur", function (){
                cShake.classList.remove("wrong-entry")
            })

            addEvent(ccNumber, "keyup", function (){
                cardNumber = this.value.replace(/[^0-9\s]/g,'')

                if (!!this.value.match(/[^0-9\s]/g)){
                    this.value = cardNumber
                }
                parts = numSplit(cardNumber.replace(/\s/g,''), [4,4,4,4])
                cardNumber = parts.join(' ')
                if (cardNumber != this.value){
                    this.value = cardNumber
                }
                if (!cardNumber){
                    cardNumber = defaultNumberN
                }

                syncText(cNumber, cardNumber)
            })

            addEvent(ccMonth, "keyup", function (){
                let month = this.value.replace(/[^0-9]/g,'')
                if (ev.keyCode == 38){
                    if (!month){month = 0}
                    month = parseInt(month)
                    month++
                    if (month < 10){
                        month = "0"+month
                    }
                }

                if (ev.keyCode == 40){
                    if (!month){month = 13}
                    month = parseInt(month)
                    month--
                    if (month == 0){ month = 1}
                    if (month < 10){
                        month = "0"+month
                    }
                }

                if (parseInt(month) > 12){month = 12}
                if ( parseInt(month) < 1 && month != 0){month = "01"}
                if (month == "00"){month = "01"}
                if (month >= "2" && month <= "9"){
                    month = "0"+month
                }
                if (month != this.value){
                    this.value = month
                }
                if (!month){
                    month = defaultNumberM
                }

                syncText(cMonth, month)
            })

            addEvent(ccYear, "keyup", function (){
                let currentYear = new Date().getFullYear().toString().substr(2,2),
                    year = this.value.replace(/[^0-9]/g,'')
                if (ev.keyCode == 38){
                    if (!year){year = currentYear}
                    year = parseInt(year)
                    year++
                    if (year < 10){
                        year = "0"+year
                    }
                }

                if (ev.keyCode == 40){
                    if (!year){
                        year = parseInt(currentYear) + 5
                    }
                    year = parseInt(year)
                    year--
                    if (year < 10){
                        year = "0"+year
                    }
                }

                if (year.toString().length == 2 && parseInt(year) < currentYear){
                    year = currentYear
                }
                if (year != this.value){
                    this.value = year
                }
                if (year > (parseInt(currentYear) + 5)){
                    year = (parseInt(currentYear) + 5)
                    this.value = year
                }
                if (!year){
                    year = defaultNumberY
                }

                syncText(cYear, year)
            })

            addEvent(ccCCV, "keyup", function (){
                cardCCV = this.value.replace(/[^0-9\s]/g,'')

                if (cardCCV != this.value){
                    this.value = cardCCV
                }
                if (!cardCCV){
                    cardCCV = defaultNumberC
                }

                syncText(cCCV, cardCCV)
            })
        }

        function addEvent (elem, event, func){
            elem.addEventListener(event, func)
        }

        function syncText (elCol, text){
            let collection
            for (let j=0; j < elCol.length; j++){
                collection = elCol[j].querySelectorAll(".card__span")
                if (!collection.length){
                    elCol[j].innerHTML = text
                } else{
                    for (let i=0; i < collection.length; i++){
                        collection[i].innerHTML = text
                    }
                }
            }
        }

        function numSplit(number, indexes){
            let tempArr = number.split(''),
                parts = []
            for (var i=0, l = indexes.length; i < l; i++){
                if (tempArr.length){
                    parts.push(tempArr.splice(0,indexes[i]).join(''))
                }
            }
            return parts;
        }
    }
    </script>
</body>
</html>
