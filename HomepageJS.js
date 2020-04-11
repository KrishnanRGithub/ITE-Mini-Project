var blurscreen = document.getElementById("blurscreen");
window.onclick = function () {
    if (event.target == blurscreen) {
        console.log('test')
        blurscreen.style.visibility = "hidden";

    }
}
/*function ExpandDesc() {
    img = event.target;
    const regex = /Logo.[a-z]+/gm;
    document.getElementById("imgDesc").src = img.src;
    descAdd = img.src;
    temp = descAdd; //for input hidden to implement in sql
    iTemp = descAdd.indexOf("Resources");
    iTemp += 10;
    Club = "";
    while (temp[iTemp] != "/") {
        Club = Club + temp[iTemp];
        iTemp += 1;
    }
    console.log(Club);

    document.getElementById("Club").value = Club;
    descAdd = descAdd.replace(regex, "Desc.txt");
    console.log(descAdd);
    iTemp = descAdd.indexOf("Resources");
    tDesc = "";
    for (i = iTemp; i < descAdd.length; i++) {
        tDesc += descAdd[i];
    }
    console.log(tDesc);
    descAdd = tDesc;
    blurscreen.style.visibility = "visible";
    document.cookie = "descAdd=''; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    t = "descAdd = " + descAdd + "; expires=Thu, 1 Dec 2022 12:00:00 UTC;";
    console.log(t)
    document.cookie = "descAdd = " + descAdd + "; expires=Thu, 1 Dec 2022 12:00:00 UTC;path=/;"


}*/