function isNumber(input){
    return typeof(arguments[0]) === 'number';
}

function confirmAdd(){
    let check = $("#addStart").val();
    let check2 = $("#addEnd").val();
    let check3 = $("#addLength").val();
    let check4 = $("#addCargo").val();
    if(!check || !check2 || !check3 || !isNumber(parseInt(check3)) || !check4){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = "Ind.: "+check+"<br>Érk.: "+check2+"<br>"+check3+" KM<br>"+$("#addCargo option:selected").text();
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
    let check = $("#delTrip").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#delTrip option:selected").text();
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
    let check = $("#modTrip").val();
    let check2 = $("#modStart").val();
    let check3 = $("#modEnd").val();
    let check4 = $("#modLength").val();
    let check5 = $("#modCargo").val();
    let curItem = $("#curStart").text()+" - "+$("#curEnd").text()+", "+$("#curLength").text()+", "+$("#curCargo").text();
    let change = "";
    if(!check2){
        change = change+$("#curStart").text()+" - ";
    }else{
        change = change+check2+" - ";
    }
    if(!check3){
        change = change+$("#curEnd").text()+", ";
    }else{
        change = change+check3+", ";
    }
    if(!check4){
        change = change+$("#curLength").text()+", ";
    }else{
        change = change+check4+", ";
    }
    if(!check5){
        change = change+$("#curCargo").text();
    }else{
        change = change+$("#modCargo option:selected").text();
    }
    if(!check || (!check4 && !isNumber(parseInt(check4)))){
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