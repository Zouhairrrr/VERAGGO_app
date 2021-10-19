function babobi(){
    const urlParams = new URLSearchParams(location.search);
    // console.log(urlParams);
    if (urlParams.has('lang')) {
        if (urlParams.get("lang") === 'en') {
            window.location.href = "/?lang=en";
        }else{
            window.location.href = "/";
        }
    }else{
        window.location.href = "/";
    }
}