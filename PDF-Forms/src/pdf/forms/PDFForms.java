

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pdf.forms;
import com.itextpdf.html2pdf.HtmlConverter;
import com.itextpdf.io.image.ImageData;
import com.itextpdf.io.image.ImageDataFactory;
import com.itextpdf.kernel.colors.Color;
import com.itextpdf.kernel.colors.ColorConstants;
import com.itextpdf.kernel.geom.Rectangle;
import com.itextpdf.kernel.pdf.PdfDocument;
import com.itextpdf.kernel.pdf.PdfWriter;
import com.itextpdf.kernel.pdf.canvas.PdfCanvas;
import com.itextpdf.kernel.pdf.canvas.draw.ILineDrawer;
import com.itextpdf.kernel.pdf.canvas.draw.SolidLine;
import com.itextpdf.layout.Document;
import com.itextpdf.layout.element.Image;
import com.itextpdf.layout.element.Paragraph;
import com.itextpdf.layout.element.Tab;
import com.itextpdf.layout.element.TabStop;
import com.itextpdf.layout.properties.TabAlignment;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.List;

import com.itextpdf.text.pdf.AcroFields;
import com.itextpdf.text.pdf.PdfAnnotation;
import com.itextpdf.text.pdf.PdfFormField;
import com.itextpdf.text.pdf.PdfReader;
import com.itextpdf.text.pdf.PdfStamper;






import com.itextpdf.html2pdf.attach.Attacher;
//import com.itextpdf.html2pdf.exceptions.Html2PdfException;
import com.itextpdf.commons.utils.FileUtil;
import com.itextpdf.commons.actions.contexts.IMetaInfo;

import static com.itextpdf.html2pdf.HtmlConverter.convertToPdf;
import com.itextpdf.kernel.pdf.DocumentProperties;
import com.itextpdf.kernel.pdf.PdfDocument;

import com.itextpdf.kernel.pdf.PdfWriter;
import com.itextpdf.layout.Document;
import com.itextpdf.layout.element.AreaBreak;
import com.itextpdf.layout.element.IElement;
import com.itextpdf.layout.element.Table;
import com.itextpdf.layout.properties.AreaBreakType;
import com.itextpdf.layout.properties.Property;
import com.itextpdf.layout.renderer.MetaInfoContainer;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.pdf.BaseFont;
import com.itextpdf.text.pdf.PdfContentByte;
import com.itextpdf.text.pdf.PdfName;
import java.io.BufferedInputStream;
import java.io.ByteArrayOutputStream;
//import com.itextpdf.styledxmlparser.IXmlParser;
//import com.itextpdf.styledxmlparser.node.IDocumentNode;
//import com.itextpdf.styledxmlparser.node.impl.jsoup.JsoupHtmlParser;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.Writer;
import java.net.URL;
import java.util.List;



import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;
import org.apache.pdfbox.text.TextPosition;




/**
 *
 * @author Moha
 */
public class PDFForms {


    public static void main(String[] args) throws IOException, DocumentException {
        String temp = ".."+System.getProperty("file.separator")+"temp-file"+System.getProperty("file.separator")+args[1]+"-temp.pdf";
        String output = ".."+System.getProperty("file.separator")+"output-file"+System.getProperty("file.separator")+args[1]+".pdf";
             OutputStream fileOutputStream = new FileOutputStream(temp);

//convertToPdf(args[0], fileOutputStream, null);

convertToPdf(new FileInputStream(args[0]), fileOutputStream, null);





    String feild_name ="";
    InputStream inputStream = new FileInputStream(temp);
                   try (   InputStream resource = inputStream;
        ByteArrayOutputStream os =  new ByteArrayOutputStream()) {
    PdfReader reader = new PdfReader(resource);
    int pgnm ;
    
        
    int n = reader.getNumberOfPages();
   
     pgnm = n;
  
    
    PdfStamper stamper = new PdfStamper(reader, os,'0',true);
    
    
    
            for (int i = 1; i <= reader.getNumberOfPages(); i++) {
 
               //getOverContent() allows you to write content on TOP of existing pdf content.
               //getUnderContent() allows you to write content on BELOW of existing pdf content.
                  
                  PdfContentByte pdfContentByte = stamper.getOverContent(i);
 
                  // Add text in existing PDF
                  pdfContentByte.beginText();
                  pdfContentByte.setFontAndSize(BaseFont.createFont
                                                    (BaseFont.TIMES_BOLD, //Font name
                                                      BaseFont.CP1257, //Font encoding
                                                     BaseFont.EMBEDDED //Font embedded
                                                     )
                               , 12); // set font and size
                  pdfContentByte.setTextMatrix(30, 130); // set x and y co-ordinates
                                             //0, 800 will write text on TOP LEFT of pdf page
                                             //0, 0 will write text on BOTTOM LEFT of pdf page
                  pdfContentByte.showText(args[1]+" Signature:                                                                                              "+args[2]+" Signature:"); // add the text
                //  System.out.println("Text added in "+outputFilePath);
                 
             
    pdfContentByte.endText();
    
    
            }
    
    
    
    PdfFormField field = PdfFormField.createSignature(stamper.getWriter());
    String Signature_nm = "Company";
    feild_name = Signature_nm ;
    field.setFieldName(feild_name);
    field.setWidget(new com.itextpdf.text.Rectangle(30, 20 , 30 + 100, 20+100), PdfAnnotation.HIGHLIGHT_NONE);
    
    PdfFormField field1 = PdfFormField.createSignature(stamper.getWriter());
    String Signature1_nm = "Client";
    feild_name = Signature1_nm ;
    field1.setFieldName(feild_name);
    field1.setWidget(new com.itextpdf.text.Rectangle(430, 20 , 430 + 100, 20+100), PdfAnnotation.HIGHLIGHT_NONE);
    
    
    
    stamper.addAnnotation(field, pgnm);
    stamper.addAnnotation(field1, pgnm);
    stamper.close();
byte[] arr_document = os.toByteArray();
            OutputStream out = new FileOutputStream(output);
out.write(arr_document);
out.close();                                         
                  













                   
                   }
    
    
    
                   
    }         
                   
}
         
        

        
//        addParagraphbodyWithTabs(document, null, 0,"body");
//        document.close();
    


    
    



/*
package pdf.forms;
import com.itextpdf.html2pdf.HtmlConverter;
import com.itextpdf.io.image.ImageData;
import com.itextpdf.io.image.ImageDataFactory;
import com.itextpdf.kernel.colors.Color;
import com.itextpdf.kernel.colors.ColorConstants;
import com.itextpdf.kernel.geom.Rectangle;
import com.itextpdf.kernel.pdf.PdfDocument;
import com.itextpdf.kernel.pdf.PdfWriter;
import com.itextpdf.kernel.pdf.canvas.PdfCanvas;
import com.itextpdf.kernel.pdf.canvas.draw.ILineDrawer;
import com.itextpdf.kernel.pdf.canvas.draw.SolidLine;
import com.itextpdf.layout.Document;
import com.itextpdf.layout.element.Image;
import com.itextpdf.layout.element.Paragraph;
import com.itextpdf.layout.element.Tab;
import com.itextpdf.layout.element.TabStop;
import com.itextpdf.layout.properties.TabAlignment;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.List;








import com.itextpdf.html2pdf.attach.Attacher;
//import com.itextpdf.html2pdf.exceptions.Html2PdfException;
import com.itextpdf.commons.utils.FileUtil;
import com.itextpdf.commons.actions.contexts.IMetaInfo;
import static com.itextpdf.html2pdf.HtmlConverter.convertToPdf;
import com.itextpdf.kernel.pdf.DocumentProperties;
import com.itextpdf.kernel.pdf.PdfDocument;
import com.itextpdf.kernel.pdf.PdfWriter;
import com.itextpdf.layout.Document;
import com.itextpdf.layout.element.IElement;
import com.itextpdf.layout.properties.Property;
import com.itextpdf.layout.renderer.MetaInfoContainer;
//import com.itextpdf.styledxmlparser.IXmlParser;
//import com.itextpdf.styledxmlparser.node.IDocumentNode;
//import com.itextpdf.styledxmlparser.node.impl.jsoup.JsoupHtmlParser;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.List;








/**
 
public class PDFForms {
public static final String DEST = "C://Users//moha//Desktop//center_text.pdf";

    public static void main(String[] args) throws IOException {
        File file = new File(DEST);
        file.getParentFile().mkdirs();

        new PDFForms().manipulatePdf(DEST);
    }

    public void manipulatePdf(String dest) throws IOException {
        PdfDocument pdfDoc = new PdfDocument(new PdfWriter(dest));
        Document document = new Document(pdfDoc);
        Rectangle pageSize = pdfDoc.getDefaultPageSize();
        float width = pageSize.getWidth() - document.getLeftMargin() - document.getRightMargin();

        SolidLine line = new SolidLine();
     OutputStream fileOutputStream = new FileOutputStream("C://Users//Moha//Desktop//string-output.pdf");

convertToPdf("ll", fileOutputStream, null);
        
         String imageFile = "C://Users//Moha//Desktop//Logo.png";
            ImageData data
                = ImageDataFactory.create(imageFile);
            // Creating an Image object
            Image image = new Image(data);
 
            // Set the position of the image.
           // image.setFixedPosition(0, 760);
            image.scaleAbsolute(100, 56);
            
            // Adding image to the document
            document.add(image);
        
        // Draw a custom line to fill both sides, as it is described in iText5 example
        MyLine customLine = new MyLine();
        addParagraphtitleWithTabs(document, null, width,"Contract Title");
        addParagraphbodyWithTabs(document, null, 0,"body");
        document.close();
    }

    private static void addParagraphtitleWithTabs(Document document, ILineDrawer line, float width, String title) {
        List<TabStop> tabStops = new ArrayList<>();

        // Create a TabStop at the middle of the page
        tabStops.add(new TabStop(width / 2, TabAlignment.CENTER, line));

        // Create a TabStop at the end of the page
        tabStops.add(new TabStop(width, TabAlignment.LEFT, line));

        Paragraph p = new Paragraph().addTabStops(tabStops);
        p
                .add(new Tab())
                .add(title)
                .add(new Tab()).setBold();
        document.add(p);
    }
    
      private static void addParagraphbodyWithTabs(Document document, ILineDrawer line, float width, String body) {
        List<TabStop> tabStops = new ArrayList<>();

        // Create a TabStop at the middle of the page
        tabStops.add(new TabStop(width / 2, TabAlignment.CENTER, line));

        // Create a TabStop at the end of the page
        tabStops.add(new TabStop(width, TabAlignment.LEFT, line));

        Paragraph p = new Paragraph().addTabStops(tabStops);
        p
                .add(new Tab())
                .add(body)
                .add(new Tab());
        document.add(p);
    }

    private static class MyLine implements ILineDrawer {
        private float lineWidth = 1;
        private float offset = 2.02f;
        private Color color = ColorConstants.BLACK;

        @Override
        public void draw(PdfCanvas canvas, Rectangle drawArea) {
            float coordY = drawArea.getY() + lineWidth / 2 + offset;
            canvas
                    .saveState()
                    .setStrokeColor(color)
                    .setLineWidth(lineWidth)
                    .moveTo(drawArea.getX(), coordY)
                    .lineTo(drawArea.getX() + drawArea.getWidth(), coordY)
                    .stroke()
                    .restoreState();
        }

        @Override
        public float getLineWidth() {
            return lineWidth;
        }

        @Override
        public void setLineWidth(float lineWidth) {
            this.lineWidth = lineWidth;
        }

        @Override
        public Color getColor() {
            return color;
        }

        @Override
        public void setColor(Color color) {
            this.color = color;
        }

        public float getOffset() {
            return offset;
        }

        public void setOffset(float offset) {
            this.offset = offset;
        }
    }
}*/