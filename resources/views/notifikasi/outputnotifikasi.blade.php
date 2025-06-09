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
    <div id="mark-read" style="cursor: pointer">
      <span style="margin-right: 10px; font-weight: bold;">Mark all read</span>
      <i class="fas fa-gear"></i>
    </div>
  </div>

  {{-- Contoh statis --}}
  <div id="notification-container" style="max-height: 70vh; overflow:hidden; overflow-y: scroll">

   </div>

  <div style="text-align: center; color: #f44336; font-weight: bold; margin-top: 25px;">
    Melihat Semua Notifikasi
  </div>
</div>

<script>
    const notificationContainer = document.getElementById("notification-container");
    notificationContainer.innerHTML = "Notifikasi sedang dimuat..."
    fetch("api/notifications", {
        headers: {
            "Authorization": `Bearer ${localStorage.getItem("accessToken")}`
        }
    }).then(val => val.json())
    .then(({data}) => {
        notificationContainer.innerHTML = '';
        if(data.length > 0) {
        data.forEach(val => {
            console.log({val})
            notificationContainer.innerHTML += `
                    <div style="background-color: #e9e9e9; border-radius: 12px; padding: 20px; display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                        <i class="fas fa-check" style="font-size: 18px; margin-right: 10px;"></i>
                        <div style="flex: 1;">
                        <div style="font-weight: bold;" id="notification-title">${val.data.title}</div>
                        <div id="notification-message">${val.data.message}</div>
                        </div>
                        <div style="font-size: 14px; color: #999;" id="notification-date">${new Date(val.created_at).toLocaleDateString()}</div>
                    </div>
            `
        })
        }else {
            notificationContainer.innerHTML = "Tidak ada notifikasi"
        }
    })

    const markRead = document.getElementById("mark-read");
    markRead.addEventListener("click", async e => {
        e.preventDefault();
        try{
            const response = await fetch("api/notifications/read/all", {
                method: "POST",
            headers: {
                "Authorization": `Bearer ${localStorage.getItem("accessToken")}`
            }
        });
        if(!response.ok){
            throw new Error("Some thing error")
        }
        const result = await response.json();
        alert("Notifikasi telah dibaca")

        }catch(err) {
            console.log({err});
           alert("Error saat mengirim data")
        }

    })
</script>
