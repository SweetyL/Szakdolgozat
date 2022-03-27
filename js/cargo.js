function confirmDelete() {
    let check = $("#delCargo").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#delCargo option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Ha kitörli a következő elemet, akkor már nincs visszaút!</p><p>"+item+"</p>",
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

function confirmAdd(){
    let check = $("#addName").val();
    let check2 = $("#addMass").val();
    let check3 = $("#addADR").val();
    if(!check || !check2 || !check3){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = $("#addName").val()+"&ensp;"+$("#addMass").val()+" tonna&ensp;"+$("#addADR option:selected").text();
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Hozzáadja a következő elemet?</p><p>"+item+"</p>",
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

function confirmModify(){
    let check = $("#modCargo").val();
    let check2 = $("#modName").val();
    let check3 = $("#modMass").val();
    let check4 = $("#modADR").val();
    let curItem = $("#curName").text()+", "+$("#curMass").text()+" tonna, "+$("#curADR").text();
    let change = "";
    if(!check2){
        change = change+$("#curName").text()+", ";
    }else{
        change = change+check2+", ";
    }
    if(!check3){
        change = change+$("#curMass").text()+" tonna, ";
    }else{
        change = change+check3+" tonna, ";
    }
    if(!check4){
        change = change+$("#curADR").text();
    }else{
        change = change+$("#modADR option:selected").text();;
    }
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Jelenlegi elem: </p><p>"+curItem+"</p><br><p>Megváltoztatja a következőre?</p><p>"+change+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.modify.submit();
              }
        })
    }
}