function confirmModify(){
    let check = $("#companyName").val();
    let check2 = $("#country").val();
    let check3 = $("#town").val();
    let check4 = $("#street").val();
    let check5 = $("#houseNumber").val();
    let check6 = $("#email").val();
    let check7 = $("#phoneNumber").val();
    let check8 = $("#webpage").val();
    let check9 = $("#password").val().length;
    let curItem = $("#curName").text()+", "+$("#curCountry").text()+", "+$("#curTown").text()+", "+$("#curStreet").text()+", "+$("#curHouseNumber").text()+", "+$("#curEmail").text()+", "+$("#curPhoneNumber").text()+", "+$("#curWebpage").text()+"";
    let change = "";
    
    if(!check){
        change += $("#curName").text()+", ";
    }else{
        change += check+", ";
    }

    if(!check2){
        change += $("#curCountry").text()+", ";
    }else{
        change += check2+", ";
    }

    if(!check3){
        change += $("#curTown").text()+", ";
    }else{
        change += check3+", ";
    }

    if(!check4){
        change += $("#curStreet").text()+", ";
    }else{
        change += check4+", ";
    }

    if(!check5){
        change += $("#curHouseNumber").text()+", ";
    }else{
        change += check5+", ";
    }

    if(!check6){
        change += $("#curEmail").text()+", ";
    }else{
        change += check6+", ";
    }

    if(!check7){
        change += $("#curPhoneNumber").text()+", ";
    }else{
        change += check7+", ";
    }
    
    if(!check8){
        change += $("#curWebpage").text()+", ";
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
                document.companyChange.submit();
              }
        })
    }
}