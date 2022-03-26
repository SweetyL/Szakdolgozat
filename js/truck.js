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