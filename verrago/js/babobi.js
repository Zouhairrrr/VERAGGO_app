function babobi(){
    const urlParams = new URLSearchParams(location.search);
    // console.log(urlParams);
    if (urlParams.has('lang')) {
        if (urlParams.get("lang") === 'en') {
            window.location.href = "index?lang=en";
        }else{
            window.location.href = "index";
        }
    }else{
        window.location.href = "index";
    }
}