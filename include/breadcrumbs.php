<?php

function breadcrumbs($path)
{
    echo '  <div class="banner-full-row page-banner" style="height:100px;background-color: #0b2d0f !important;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="page-name float-left text-white mt-1 mb-0">
              <span id="cardanoInformation"></span>
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