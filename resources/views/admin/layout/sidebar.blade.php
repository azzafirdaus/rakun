@extends('admin.layout.default')

@section('sidebar')

<!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="page-sidebar-menu">
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                        </div>
                        <div class="clearfix">
                        </div>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    </li>

                    <li class="<?php if ('home' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span class="title">
                            Dashboard
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <?php if($peran == 0): ?>
                    <li class="<?php if ('trans-keseluruhan' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/transaksi-keseluruhan') }}">
                        <i class="fa fa-money"></i>
                        <span class="title">
                            Transaksi Keseluruhan
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ($activePage == 'terapis' || $activePage == 'terapis-absen' || $activePage == 'terapis-laporan' || $activePage == 'laporanOb'):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/terapis') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            Terapis
                        </span>
                        <span class="">
                        </span>
                        <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php if ('terapis-absen' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/terapis-absen') }}">
                                Absen Terapis</a>
                            </li>
                            <li class="<?php if ('terapis-laporan' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/terapis-laporan') }}">
                                Laporan Terapis</a>
                            </li>
                            <li class="<?php if ('terapis' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/terapis') }}">
                                Terapis</a>
                            </li>
                            <li class="<?php if ('laporanOb' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/ob-laporan') }}">
                                Laporan OB</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?php if ('karaoke-laporan' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/karaoke-laporan') }}">
                        <i class="fa fa-microphone"></i>
                        <span class="title">
                            Karaoke
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ('bar-laporan' === $activePage || 'bar2-laporan' === $activePage || 'bar3-laporan' === $activePage):?>active<?php endif;?>">
                        <a href="">
                        <i class="fa fa-cutlery"></i>
                        <span class="title">
                            Bar
                        </span>
                        <span class="">
                        </span>
                        <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php if ('bar-laporan' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/bar-laporan') }}">
                                Bar Lantai 2</a>
                            </li>
                            <li class="<?php if ('bar2-laporan' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/bar2-laporan') }}">
                                Bar Lantai 3</a>
                            </li>
                            <li class="<?php if ('bar3-laporan' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/bar3-laporan') }}">
                                Bar Lantai 4</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php if ('fasilitas' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/fasilitas') }}">
                        <i class="fa fa-cogs"></i>
                        <span class="title">
                            Fasilitas
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ('kartu' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/kartu') }}">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">
                            Kartu
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ('kasir' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/kasir-laporan') }}">
                        <i class="fa fa-money"></i>
                        <span class="title">
                            Kasir
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ('setoran' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/setoran') }}">
                        <i class="fa fa-sign-in"></i>
                        <span class="title">
                            Setoran
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <?php endif; if ($peran == 1): ?>
                    <li class="<?php if ('pengguna' === $activePage):?>active<?php endif;?>">
                        <a href="{{ url('admin/pages/pengguna') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            Pengguna
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="<?php if ('makanan' === $activePage || 'makanan2' === $activePage || 'makanan3' === $activePage):?>active<?php endif;?>">
                        <a href="">
                        <i class="fa fa-cutlery"></i>
                        <span class="title">
                            Makanan
                        </span>
                        <span class="">
                        </span>
                        <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php if ('makanan' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/makanan') }}">
                                Gudang Lantai 2</a>
                            </li>
                            <li class="<?php if ('makanan2' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/makanan2') }}">
                                Gudang Lantai 3</a>
                            </li>
                            <li class="<?php if ('makanan3' === $activePage):?>active<?php endif;?>">
                                <a href="{{ url('admin/pages/makanan3') }}">
                                Gudang Lantai 4</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR -->
   @stop