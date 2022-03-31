function confirmAdd(){
    let check = $("#addAdmin").val();
    let check2 = $("#addPass").val().length;
    if(!check || check2==0){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Hozzáadja a következő felhasználót az adminokhoz?</p><p>"+$("#addAdmin option:selected").text()+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.add.submit();
              }
        })
    }
}

function confirmDelete() {
    let check = $("#delAdmin").val();
    let check2 = $("#delPass").val().length;
    if(!check || check2==0){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Kitörli a következő felhasználót az adminok közül?</p><p>"+$("#delAdmin option:selected").text()+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.delete.submit();
              }
        })
    }
}