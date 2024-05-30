<?php
/*****
 * Title : Cardano Property Soltuions : Tokenization and Fractionalization
 * Description : This is a web3 Cardano based real estate application based on the most popular php, mysql, html, css, bootstrap, js, jquery. The primary focus is to prototype Cardano integration 
 * with real life use cases and show case endless usage opportunities for developers and ordinary users.
 * Authors : Suraj Kumar Vishwakarma, Bernard Sibanda
 * Github : https://github.com/wimsio/cardanopropertysolutions, https://cardanopropertysolutions.co, https://github.com/suraj25809/Real-Estate-Php
 * Date : 2021 - 2024
 * Licence : MIT
 * Communication Channels : cto@wims.io, admin@cardanopropertysolutions.co
 * Company : Women In Move Solutions
 *****/
function breadcrumbs($path)
{
    echo '  <div class="banner-full-row page-banner" style="height:110px;background-color: #0b2d0f !important;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="page-name float-left text-white mt-1 mb-0">
              <span id="cardanoInformation"></span><br>
              <span style="color:orange;"> ***NB: This webapp/dApp is a prototype. All data here is demo.</span>
            </p>
          </div>
          <div class="col-md-6">
            <nav aria-label="breadcrumb" class="float-left float-md-right">
              <ol class="breadcrumb bg-transparent m-0 p-0">
                <li class="breadcrumb-item text-white">
                  <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item active">'.$path.'</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>';
}
?>