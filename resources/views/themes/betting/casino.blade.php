@extends($theme.'layouts.app')
@section('title',trans('CASINO'))
@section('content')
@include($theme.'partials.gameTab')
<section class="about-section">
  <div class="container my-4">
      <div class="row align-items-center cstm_casino_2">
          <div class="">
              <div class="hovereffect">
                    <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal"><img src="assets/img/games/crazytime.jpg"
                        alt="..." class="img-fluid"/>
                    </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                    <img src="assets/img/games/dreamcatcher.jpg"
                            alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/lightninhdice.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/lightroullete.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/monopoly.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/roullete.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/supersicbo.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/threepoker.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/megaball100.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/freebetblackjack.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/infiniteblackjack.jpg"
                        alt="..." class="img-fluid"/>
                </a>
              </div>
          </div>
          <div class="">
              <div class="hovereffect">
                <a href="#" class="open-modal" data-bs-toggle="modal" data-bs-target="#alertModal">
                  <img src="assets/img/games/hackonbackcart.png"
                        alt="..."  class="img-fluid"/>
                </a>
              </div>
          </div>
      </div>
  </div>
    <div class="modal" id="alertModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Attention!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please Verify Your Identity in order to play casino games!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cmn--btn" style="color:white" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
@include($theme.'partials.footer')
@endsection