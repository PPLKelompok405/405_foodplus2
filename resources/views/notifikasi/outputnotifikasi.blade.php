<!-- resources/views/components/notification-popup.blade.php -->
<div style="
  background: white;
  width: 600px;
  max-width: 90%;
  padding: 30px;
  border-radius: 20px;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -20%);
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  z-index: 1000;
  font-family: 'Segoe UI', sans-serif;
">

  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <span style="font-size: 20px; font-weight: bold;">Notifikasi</span>
    <div>
      <span style="margin-right: 10px; font-weight: bold;">Mark all read</span>
      <i class="fas fa-gear"></i>
    </div>
  </div>

  {{-- Contoh statis --}}
  <div style="background-color: #e9e9e9; border-radius: 12px; padding: 20px; display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
    <i class="fas fa-check" style="font-size: 18px; margin-right: 10px;"></i>
    <div style="flex: 1;">
      <div style="font-weight: bold;">Request Donasi</div>
      <div>Request donasi telah disetujui</div>
    </div>
    <div style="font-size: 14px; color: #999;">1 Maret 2025</div>
  </div>

  <div style="background-color: #e9e9e9; border-radius: 12px; padding: 20px; display: flex; justify-content: space-between; align-items: flex-start;">
    <i class="fas fa-check" style="font-size: 18px; margin-right: 10px;"></i>
    <div style="flex: 1;">
      <div style="font-weight: bold;">Donasi</div>
      <div>Donasi telah diterima</div>
    </div>
    <div style="font-size: 14px; color: #999;">30 Januari 2025</div>
  </div>

  <div style="text-align: center; color: #f44336; font-weight: bold; margin-top: 25px;">
    Melihat Semua Notifikasi
  </div>
</div>
