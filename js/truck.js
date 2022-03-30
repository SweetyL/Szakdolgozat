function isNumber(input){
    return typeof(arguments[0]) === 'number';
}

function confirmAdd(){
    let check = $("#addName").val();
    let check2 = $("#addBrand").val();
    let check3 = $("#addEngine").val();
    let check4 = $("#addTank").val();
    let check5 = $("#addAxles").val();
    let check6 = $("#addCons").val();
    if(!check || !check2 || !check3 || !check4 || !check5 || !isNumber(parseInt(check4)) || !isNumber(parseInt(check5))){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = "";
        if(!check6){
            item = check2+"&ensp;"+check+",&ensp;"+$("#addEngine option:selected").text()+",&ensp;"+check4+" L,&ensp;"+check5+" tengely";
        }else{
            item = check2+"&ensp;"+check+",&ensp;"+$("#addEngine option:selected").text()+",&ensp;"+check4+" L,&ensp;"+check6+" L/100KM&ensp;<br>"+check5+" tengely";
        }
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
    let check = $("#delTruck").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Nem választott ki semmit!'
        })
    }else{
        let item = $("#delTruck option:selected").text();
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
    let check = $("#modTruck").val();
    let check2 = $("#modBrand").val();
    let check3 = $("#modName").val();
    let check4 = $("#modEngine").val();
    let check5 = $("#modTank").text();
    let check6 = $("#modCons").val();
    let check7 = $("#modAxles").val();
    let curItem = $("#curBrand").text()+", "+$("#curName").text()+", "+$("#curEngine").text()+", "+$("#curTank").text()+", "+$("#curCons").text()+", "+$("#curAxles").text()+
    " tengely";
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
        change = change+$("#curEngine").text();
    }else{
        change = change+$("#modEngine option:selected").text()+", ";
    }

    if(!check5){
        change = change+$("#curTank").text()+" L, ";
    }else{
        change = change+check5+" L, ";
    }

    if(!check6){
        change = change+$("#curCons").text()+" L/100KM, ";
    }else{
        change = change+check5+" L/100KM, ";
    }

    if(!check7){
        change = change+$("#curAxles").text()+" tengely";
    }else{
        change = change+check7;
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