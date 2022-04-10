function driverConfirmAdd(){
    let check = $("#addADR").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#addADR option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Hozzáadja a profiljához a következő tanúsítványt?</p><p>"+item+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.addForDriver.submit();
              }
        })
    }
}

function driverConfirmDel() {
    let check = $("#delADR").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#delADR option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Törli a profiljáról a következő tanúsítványt?</p><p>"+item+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
                cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.delForDriver.submit();
              }
        })
    }
}

function adminConfirmAdd(){
    let check = $("#selDriverAdd").val();
    let check2 = $("#addADR").val();
    if(!check || !check2){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let user = $("#selDriverAdd option:selected").text();
        let item = $("#addADR option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Hozzáadja "+user+" profiljához a következő tanúsítványt?</p><p>"+item+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.addForAdmin.submit();
              }
        })
    }
}

function adminConfirmDel() {
    let check = $("#selDriverDel").val();
    let check2 = $("#delADR").val();
    if(!check || !check2){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let user = $("#selDriverDel option:selected").text();
        let item = $("#delADR option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Törli "+user+" profiljáról a következő tanúsítványt?</p><p>"+item+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
                cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.delForAdmin.submit();
              }
        })
    }
}