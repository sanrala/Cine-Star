<%EnableSessionState=False
host = Request.ServerVariables("HTTP_HOST")

if host = "cinestars.fr" or host = "www.cinestars.fr" then response.redirect("https://www.cinestars.fr/")

else
response.redirect("https://www.cinestars.fr/error.htm")
end if
%>