function validateAccess() {
    const user = document.getElementById('username').value;
    const pass = document.getElementById('password').value;
    const display = document.getElementById('message');

    const encodedFlag = "Q1RGe0o0VjQ1Q1IxUDdfMTVfUFU4TDFDfQ==";

    if (user === "admin_sec" && pass === "P4ssw0rd_Unbr3akabl3!") {
        const decodedFlag = atob(encodedFlag);
        display.innerHTML = `
                <div class="status-success">
                    ACCÈS ACCORDÉ<br><br>
                    FLAG : ${decodedFlag}
                </div>`;
    } else {
        display.innerHTML = '<span class="status-error">[!] ÉCHEC D\'AUTHENTIFICATION</span>';
    }
}