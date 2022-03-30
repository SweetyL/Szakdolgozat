function isNumber(input){
    return typeof(arguments[0]) === 'number';
}

function confirmAdd(){
    let check = $("#addName").val();
    let check2 = $("#addBrand").val();
    let check3 = $("#addPower").val();
    if(!check || !check2 || !isNumber(parseInt(check3))){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = check+", "+check2+", "+check3+" kW";
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

function confirmDelete() {
    let check = $("#delEngine").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#delEngine option:selected").text();
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

function confirmModify(){
    let check = $("#modEngine").val();
    let check2 = $("#modBrand").val();
    let check3 = $("#modName").val();
    console.log(check3);
    let check4 = $("#modPower").val();
    let curItem = $("#curBrand").text()+", "+$("#curName").text()+", "+$("#curPower").text()+"";
    let change = "";
    if(!check2){
        change = change+$("#curBrand").text()+", ";
    }else{
        change = change+check2+", ";
    }
    if(!check3){
        change = change+$("#curName").text()+", ";
    }else{
        change = change+check3+", ";
    }
    if(!check4){
        change = change+$("#curPower").text()+" kW";
    }else{
        change = change+check4+" kW";
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