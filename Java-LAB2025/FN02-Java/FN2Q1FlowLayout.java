import javax.swing.*;
import java.awt.*;

class FN2Q1FlowLayout extends JFrame{
    FN2Q1FlowLayout(){
        
        setSize(400,400);
        setLayout(new FlowLayout());
        setVisible(true);
        
        add(new Button("Button1"));
        add(new Button("Button2"));
        add(new Button("Button3"));
        add(new Button("Button4"));
        add(new Button("Button5"));
        add(new Button("Button6"));
        
    }
    public static void main(String ar[]){
        new FN2Q1FlowLayout();
    }
}