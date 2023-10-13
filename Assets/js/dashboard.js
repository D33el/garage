$(document).ready(async function () {
    console.log('dashboard.js Loaded');
    if(checkMobile()){
        $('.app').html(`
        <div class="mobile">Accés impossible sur mobile</div>
        `)
    }
});