function deleteBtn(delete_url) {
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    Swal.fire({
      title: "ต้องการลบใช่หรือไม่ !",
      showCancelButton: true,
      confirmButtonText: "ใช่",
      cancelButtonText: "ยกเลิก",
      confirmButtonColor: "#FF0000",
      customClass: {
        popup: 'responsive-modal'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        
        fetch(delete_url, {
          method: 'post',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({
            _token: csrfToken
          })
        })
        .then(response => {
          
          if (response.ok) {
            
            Swal.fire({
              title: "ลบข้อมูลสำเร็จ",
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then((result) =>{
                if(result.timer > 1500){
                    window.location.reload()
                }
            });
            
  
            // รีเฟรชหน้าเว็บหรืออัปเดตข้อมูลบนหน้าปัจจุบัน
            // ...
          } else {
            // แสดงข้อความแจ้งเตือนการล้มเหลว
            Swal.fire({
              title: "ลบข้อมูลล้มเหลว",
              text: response.statusText,
              icon: 'error',
              showConfirmButton: true
            });
          }
        })
        .catch(error => {
          // แสดงข้อความแจ้งเตือนการล้มเหลว
          Swal.fire({
            title: "ลบข้อมูลล้มเหลว",
            text: error.message,
            icon: 'error',
            showConfirmButton: true
          });
        });
      }
    });
}


window.addEventListener('resize', function() {
  clearTimeout(window.resizedFinished);
  window.resizedFinished = setTimeout(function(){
      location.reload();
  });
});