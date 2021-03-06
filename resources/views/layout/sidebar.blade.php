<div class="sidebar" data-color="orange" data-image="../assets/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Ct
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{ asset('assets') }}/img/default-avatar.png" />
                </div>

                <a href="#collapseExample" class="collapsed">
						<span>
							<?php
                                    $name =Session::get('admin_name');
                                    if ($name) {
                                        echo $name;
                                    }
                                 ?>
						</span>
                </a>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{ URL::to('/dashboard') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Trang ch???</p>
                </a>
            </li>
            <li>
                <a   href="{{ URL::to('/all-category-product') }} ">
                    <i class="pe-7s-plugin"></i>
                    <p>Qu???n l?? danh m???c</p>
                </a>
            </li>
            <li>
                <a   href="{{ URL::to('/all-product') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Qu???n l?? s???n ph???m</p>
                </a>
            </li>
            <li>
                <a   href="{{ URL::to('/all-supplier') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Qu???n l?? nh?? ph??n ph???i</p>
                </a>
            </li>
            <li>
                <a   href="/all-employee">
                    <i class="pe-7s-news-paper"></i>
                    <p>Qu???n l?? nh??n vi??n</p>
                </a>
            </li>
            <li>
                <a   href="{{ URL::to('/all-customer') }}">
                    <i class="pe-7s-map-marker"></i>
                    <p>Qu???n l?? kh??ch h??ng</p>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('/all-invoice') }}">
                    <i class="pe-7s-graph1"></i>
                    <p>Qu???n l?? ho?? ????n</p>
                </a>
            </li>
        </ul>
    </div>
</div>
