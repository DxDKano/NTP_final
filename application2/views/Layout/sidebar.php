<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->segment(1)<>'Beranda'){echo 'collapsed';}?>" href="Beranda">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Data</li>

      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->segment(1)!='Pemutakhiran'){echo 'collapsed';}?>" data-bs-target="#pemutakhiran-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Pemutakhiran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pemutakhiran-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Pemutakhiran/entri_data" class="<?php if($this->uri->segment(2)=='entri_data'){echo 'active';}?>">
              <i class="bi bi-circle"></i><span>Entri Data</span>
            </a>
          </li>
          <li>
            <a href="Pemutakhiran/monitoring">
              <i class="bi bi-circle"></i><span>Monitoring</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pemutakhiran Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->segment(1)!='Kuesioner'){echo 'collapsed';}?>" data-bs-target="#kuesioner-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Entri Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kuesioner-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Kuesioner/entri_data">
              <i class="bi bi-circle"></i><span>Entri Data</span>
            </a>
          </li>
          <li>
            <a href="Kuesioner/monitoring">
              <i class="bi bi-circle"></i><span>Monitoring</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kuesioner Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->segment(1)!='Anomali'){echo 'collapsed';}?>" data-bs-target="#anomali-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-checklist"></i><span>Anomali</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="anomali-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Anomali/tanaman_pangan">
              <i class="bi bi-circle"></i><span>Tanaman Pangan</span>
            </a>
          </li>
          <li>
            <a href="Anomali/konsumsi">
              <i class="bi bi-circle"></i><span>Konsumsi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kuesioner Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($this->uri->segment(1)<>'Download'){echo 'collapsed';}?>" href="Download">
          <i class="bi bi-grid"></i>
          <span>Download Raw Data</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->
