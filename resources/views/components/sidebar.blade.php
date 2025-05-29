<div class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-header">Dashboard</a>

    <div class="sidebar-section">Pengetahuan</div>
    <a href="#" class="sidebar-item">Diagnosa</a>
    <a href="#" class="sidebar-item">Gejala</a>
    <a href="#" class="sidebar-item">Penyakit</a>
    <a href="#" class="sidebar-item">Hasil</a>

    <div class="sidebar-section">Pengaturan</div>
    <a href="{{ route('admin.admin') }}" class="sidebar-item">Admin</a>

    <!-- Ganti form logout dengan tombol yang memicu modal -->
    <a href="#" class="sidebar-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
</div>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin keluar dari sistem?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
    .sidebar {
        font-size: 1.2rem;
        height: 100vh;
        background-color: #f8f9fa;
        position: fixed;
        width: 250px;
        padding-top: 20px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-item {
        padding: 10px 20px;
        color: #333;
        text-decoration: none;
        display: block;
        font-weight: 700;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 0.5rem;
    }

    .sidebar-item:hover {
        background-color: #e9ecef;
        color: #333;
    }

    .sidebar-header {
        font-size: 1.7rem;
        font-weight: 800;
        padding: 0 20px 10px;
        text-decoration: none;
        color: black;
    }

    .sidebar-header:hover {
        color: black;
    }

    .sidebar-section {
        font-size: 0.85rem;
        color: #6c757d;
        padding: 10px 20px 5px;
        margin-top: 15px;
    }
</style>
