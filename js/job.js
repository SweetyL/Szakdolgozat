function companyConfirmAdd() {
    let check = $("#addTrip").val();
    let check2 = $("#addTruck").val();
    let check4 = $("#addComment").val();
    let check5 = $("#addDeadline").val();
    let length = 0;
    let dateNow = new Date();
    let dateInput = new Date(check5);
    if(!check4){
        length = check4.length;
    }
    if(!check || !check2 || !check5 || length > 200 || !(dateNow.getTime() <= dateInput.getTime())){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Létrehozza ezt a megbízást?</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
                cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.companyAdd.submit();
              }
        })
    }
}

function companyConfirmDel(){
    let check = $("#delJob").val();
    if(!check){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        let item = $("#delJob option:selected").text();
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
                document.companyDel.submit();
              }
        })
    }
}

function companyConfirmModify(){
    let check = $("#modJob").val();
    let check2 = $("#modTrip").val();
    let check3 = $("#modTruck").val();
    let check4 = $("#modReward").val();
    let check5 = $("#modComment").val();
    let check6 = $("#modDeadline").val();
    let dateNow = new Date();
    let dateInput = new Date(check5);
    let length = 0;
    if(!check5){
        length = check4.length;
    }
    let curItem = $("#curTrip").text()+", "+$("#curTruck").text()+", "+$("#curReward").text()+" EUR, "+$("#curDeadline").text();
    let change = "";
    if(!check2){
        change += $("#curTrip").text()+", ";
    }else{
        change += $("#modTrip option:selected").text()+", ";
    }
    if(!check3){
        change += $("#curTruck").text()+", ";
    }else{
        change += $("#modTruck option:selected").text()+", ";
    }
    if(!check4){
        change += $("#curReward").text()+" EUR, ";
    }else{
        change += check4+" EUR, ";
    }
    if(!check6){
        change += $("#curDeadline").text();
    }else{
        change += check6;
    }
    if(!check || length > 200 || (!check6 && (dateNow.getTime() <= dateInput.getTime()))){
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
                document.companyMod.submit();
              }
        })
    }
}