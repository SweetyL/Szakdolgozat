function confirmModify(){
    let check = $("#lastname").val();
    let check2 = $("#firstname").val();
    let check3 = $("#country").val();
    let check4 = $("#town").val();
    let check5 = $("#street").val();
    let check6 = $("#houseNumber").val();
    let check7 = $("#email").val();
    let check8 = $("#phoneNumber").val();
    let check9 = $("#password").val().length;
    let curItem = $("#curLastname").text()+", "+$("#curFirstname").text()+", "+$("#curCountry").text()+", "+$("#curTown").text()+", "+$("#curStreet").text()+", "+$("#curHouseNumber").text()+", "+$("#curEmail").text()+", "+$("#curPhoneNumber").text()+"";
    let change = "";
    
    if(!check){
        change += $("#curLastname").text()+", ";
    }else{
        change += check+", ";
    }

    if(!check2){
        change += $("#curFirstname").text()+", ";
    }else{
        change += check2+", ";
    }

    if(!check3){
        change += $("#curCountry").text()+", ";
    }else{
        change += check3+", ";
    }

    if(!check4){
        change += $("#curTown").text()+", ";
    }else{
        change += check4+", ";
    }

    if(!check5){
        change += $("#curStreet").text()+", ";
    }else{
        change += check5+", ";
    }

    if(!check6){
        change += $("#curHouseNumber").text()+", ";
    }else{
        change += check6+", ";
    }

    if(!check7){
        change += $("#curEmail").text()+", ";
    }else{
        change += check7+", ";
    }

    if(!check8){
        change += $("#curPhoneNumber").text()+", ";
    }else{
        change += check8+", ";
    }

    if(check9==0){
        Swal.fire({
            icon: 'error',
            title: 'Hiba!',
            text: 'Hibás adatok!'
        })
    }else{
        Swal.fire({
              title: 'Biztos benne?',
              html: "<p>Jelenlegi adatok: </p><p>"+curItem+"</p><br><p>Megváltoztatja a következőre?</p><p>"+change+"</p>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Igen, mehet!',
            cancelButtonText: 'Vissza'
        }).then((result) => {
              if (result.isConfirmed) {
                document.driverChange.submit();
              }
        })
    }
}