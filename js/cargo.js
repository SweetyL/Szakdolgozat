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
    let curItem = $("#curName").text()+", "+$("#curMass").text()+", "+$("#curADR").text();
    let change = check2+", "+check3+" tonna, "+$("#modADR option:selected").text();
    if(!check || !check2 || !check3 || !check4){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = $("#modADR option:selected").text();
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