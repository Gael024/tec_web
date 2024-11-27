<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Practica 15</title>
               
            </head>
            <body>
                     <h1>Practica 15</h1>
            <table>
               <thead>

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

             <table>
               <thead>

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