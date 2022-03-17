function showQR(fname){
    Swal.fire({
        title: "Az Ön QR kódja",
        html: "<img src='http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fbanki13.komarom.net%2Fklaszlo%2Fszakdolgozat%2FgeneratedPages%2F"+arguments[0]+".html&amp;qzone=1&amp;margin=0&amp;size=200x200&amp;ecc=L'/>"
    })
}