/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pdfsigner;
import static com.itextpdf.text.Annotation.DESTINATION;
import java.io.BufferedOutputStream;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.security.GeneralSecurityException;
import java.security.KeyStore;
import java.security.PrivateKey;
import java.security.Security;
import java.security.cert.Certificate;
import java.util.Calendar;

import org.bouncycastle.jce.provider.BouncyCastleProvider;

import com.itextpdf.text.Document;
import java.io.FileOutputStream;  

import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Image;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.Rectangle;
import com.itextpdf.text.pdf.PdfReader;
import com.itextpdf.text.pdf.PdfSignatureAppearance;
import com.itextpdf.text.pdf.PdfStamper;
import com.itextpdf.text.pdf.PdfWriter;
import com.itextpdf.text.pdf.security.BouncyCastleDigest;
import com.itextpdf.text.pdf.security.ExternalDigest;
import com.itextpdf.text.pdf.security.ExternalSignature;
import com.itextpdf.text.pdf.security.MakeSignature;
import com.itextpdf.text.pdf.security.MakeSignature.CryptoStandard;
import com.itextpdf.text.pdf.security.PrivateKeySignature;

import com.itextpdf.text.pdf.security.BouncyCastleDigest;
import com.itextpdf.text.pdf.security.DigestAlgorithms;
import com.itextpdf.text.pdf.security.ExternalDigest;
import com.itextpdf.text.pdf.security.ExternalSignature;
import com.itextpdf.text.pdf.security.MakeSignature;
import com.itextpdf.text.pdf.security.PrivateKeySignature;
import java.io.FileInputStream;
import java.security.AccessController;
import java.security.PrivilegedAction;
/**
 *
 * @author Administrator
 */
public class PDFSigner {

 // Signs the pdf
    public void signPdf(String src, String imgpath,String fieldname,String certpath ,boolean certified, boolean graphic) throws GeneralSecurityException, IOException, DocumentException{
      //  String path = "C://Users//Administrator//Documents//NetBeansProjects//PDFSigner//Fat_Client3.pfx";
        String keystore_password = "pwd";
        String key_password = "123";
            KeyStore ks = KeyStore.getInstance("PKCS12");
                 InputStream is = new FileInputStream(certpath);
      ks.load(is, key_password.toCharArray());


        String alias = ks.aliases().nextElement();
        PrivateKey pk = (PrivateKey) ks.getKey(alias, key_password.toCharArray());
        Certificate[] chain = ks.getCertificateChain(alias);
        byte[] pdfByteArray = null;
   String test=src.substring(0, src.length() - 4) + "-signed.pdf";
        OutputStream baosPDF =new FileOutputStream(src.substring(0, src.length() - 4) + "-signed.pdf");// new ByteArrayOutputStream();
       
       PdfReader reader;//new PdfReader(bytearrayb);
        reader = new PdfReader (src.toString());
      
        PdfStamper stamper = PdfStamper.createSignature(reader, baosPDF, '\0', null, true);

        PdfSignatureAppearance appearance = stamper.getSignatureAppearance();
        appearance.setReason("eContract");
        appearance.setLocation("Footer");
        appearance.setVisibleSignature(fieldname);
        if (certified) appearance.setCertificationLevel(PdfSignatureAppearance.CERTIFIED_NO_CHANGES_ALLOWED);
      //  if (graphic) {
            appearance.setRenderingMode(PdfSignatureAppearance.RenderingMode.GRAPHIC);
            appearance.setSignatureGraphic(Image.getInstance(imgpath));

      //  }
        appearance.setSignDate(Calendar.getInstance());
        appearance.setSignatureCreator("test");
        ExternalSignature es = new PrivateKeySignature(pk, "SHA-256", "BC");
        ExternalDigest digest = new BouncyCastleDigest();
        MakeSignature.signDetached(appearance, digest, es, chain, null, null, null, 0, CryptoStandard.CMS);
        baosPDF.flush();
        baosPDF.close();

    
    }

    
    public static void main(String[] args) throws Exception {
        Security.addProvider(new BouncyCastleProvider());
        PDFSigner signatures = new PDFSigner();
        try {
            signatures.signPdf(args[0], args[1],args[2],args[3] ,true, false);
        }
        catch (Exception e) {
            e.printStackTrace();
        }
    }
    
}
