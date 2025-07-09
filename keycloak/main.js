document.addEventListener("DOMContentLoaded", function() {
    var userGroupsLists = [];
    // Initialize Keycloak
    const keycloak = new Keycloak({
        url: 'https://auth.sainmarks.com:8443',
        realm: 'sainmarks',
        clientId: 'hrms'
    });
    accesstoken=""
    keycloak.init({ 
        onLoad: 'check-sso' 
    }).then(function(authenticated) {
        if(!authenticated){
            keycloak.login();
        }else{
            console.log(keycloak.token);
            console.log(JSON.stringify(keycloak.tokenParsed, null, 2));
            var token = keycloak.tokenParsed
   

            $.ajax({
                url: "https://auth.sainmarks.com:8443/realms/master/protocol/openid-connect/token",
                type: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                data: {
                    client_id: "admin-cli",
                    username: "admin",
                    password: "admin@123",
                    grant_type: "password"
                },
                success: function(response) {
                    console.log("Success:", response);
                    accesstoken = response.access_token
                    $.ajax({
                    url: "https://auth.sainmarks.com:8443/admin/realms/sainmarks/users/"+token.sub+"/groups",
                    method: "GET",
                    headers: {
                        "Authorization": "Bearer "+accesstoken
                    },
                    success: function(userGroups) {
                        userGroupsLists = userGroups
                        console.log("userGroups:", userGroups);
                        const ip_restriction = userGroups.find(item => item.name === "ip_restriction");
                        if (ip_restriction) {
                            console.log(ip_restriction.id); 
                            $.ajax({
                                url: "https://auth.sainmarks.com:8443/admin/realms/sainmarks/groups/"+ip_restriction.id,
                                method: "GET",
                                headers: {
                                    "Authorization": "Bearer "+accesstoken
                                },
                                success: function(ip_restriction) {
                                    console.log("ip_restriction:", ip_restriction);
                                    const ip = ip_restriction.attributes['ip']
                                    console.log(ip[0]);
                                 
                                    let currentIPs = ip[0].split(",");
                                    let allowedIPs = $("#cip").val();
                                    if(!currentIPs.includes(allowedIPs)){
                                        alert("You can't access the portal outside of the company");
                                        window.location.href = "index.php";
                                    }

                                    // }else{
                                    //     setModule(token)
                                    // }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error:", status, error);
                                }
                            });
            
                        } else {
                            console.log("ip_restriction not found");
                            setModule(token)
                        }
            
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                    }
                });
            
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
            
        }        

    }).catch(function() {
        console.log('Failed to initialize');
    });

    function setModule(token){
        $("#username").text(token.name)            
        $("#wip").prop('href','whitelist_ip.php?uuid='+token.sub)
        var role = token.realm_access.roles
        console.log(role);

        console.log('setmodule');
        console.log(userGroupsLists);
        
        
        if(role.includes("sainmarks-admin")){
            $(".app").show()
        }else{
            const ilabel_live = userGroupsLists.find(item => item.name === "ilabel-live");
            if (ilabel_live) {
                $(".app-ilabel-live").show()
            }
            const ilabel_new = userGroupsLists.find(item => item.name === "ilabel-new");
            if(ilabel_new){
                $(".app-ilabel-new").show()
            }
            const hrms = userGroupsLists.find(item => item.name === "hrms");
            if(hrms){
                $(".app-hrms").show()
            }
            const vms = userGroupsLists.find(item => item.name === "vms");
            if(vms){
                $(".app-vms").show()
            }
            const bc = userGroupsLists.find(item => item.name === "bc");
            if(bc){
                $(".app-bc").show()
            }
        }
        document.getElementById("loader").style.display = "none";
    }
    
    document.getElementById('logoutBtn').addEventListener('click', function() {
        keycloak.logout();
    });
});