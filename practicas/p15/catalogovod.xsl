<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Practica 15</title>
                <style type="text/css">
                    
                    h1 {margin-left: 600px}
         			table {border: 1px solid; width: 70%; margin-left:200px}
                    th {text-align: center; background-color: orange;}
                    td {text-align: center;}
                    img {width: 500px; height: auto; display: block; margin: 0 auto;}
                    h3{margin-left:670px}
                
         		</style>
               
            </head>
            <body>
                 <img src="Logo.jpg"/>
                     <h3>CUENTA</h3>
                 <table>
                     <thead>
                        
                        <tr>
                           <th>Correo</th>
                           <th>Perfiles</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td><xsl:value-of select="//cuenta/@correo"/></td>
                            <td>
                                <xsl:for-each select="//cuenta/perfiles/perfil">
                                    <p><xsl:value-of select="@usuario"/> (Idioma: <xsl:value-of select="@idioma"/>)</p>
                                </xsl:for-each>
                            </td>
                        </tr>
                     </tbody>
                 </table>

                     <h1>Catalogo disponible</h1>
            <table border="1">
               <thead>
                  
                  <tr>
                     <th colspan="3">PELICULAS</th>
                  </tr>
                   
                  <tr>
                      <th>Titulo</th>
                      <th>Duración</th>
                      <th>Genero</th>

                  </tr>
               
               </thead>

               <tbody>
                   
                    <xsl:for-each select="//peliculas/genero/titulo">
                            <tr>
                                <td><xsl:value-of select="normalize-space(.)"/></td>
                                <td><xsl:value-of select="@duración"/></td>
                                <td><xsl:value-of select="../@nombre"/></td>
                            </tr>
                        </xsl:for-each>
               
               </tbody>
            </table>
               <br></br>
             <table border="1">
               <thead>

                  <tr>
                    <th colspan="3">SERIES</th>
                  </tr>

                  <tr>
                      <th>Titulo</th>
                      <th>Duración</th>
                      <th>Genero</th>

                  </tr>
               
               </thead>

               <tbody>
                   
                   <xsl:for-each select="//series/genero/titulo">
                            <tr>
                                <td><xsl:value-of select="normalize-space(.)"/></td>
                                <td><xsl:value-of select="@duración"/></td>
                                <td><xsl:value-of select="../@nombre"/></td>
                            </tr>
                        </xsl:for-each>    
               
               </tbody>
            </table>
                
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>