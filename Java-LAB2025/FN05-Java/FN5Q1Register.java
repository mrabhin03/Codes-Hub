import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class FN5Q1Register extends JFrame implements ActionListener{
    JTextArea text1;
    JRadioButton R1,R2,R3;
    JComboBox<String> box;
    JLabel out;
    FN5Q1Register(){
        setLayout(null);
        
        setSize(500,500);

        JLabel nameL=new JLabel("Name: ");
        nameL.setBounds(50,50,100,30);
        add(nameL);

        text1=new JTextArea();
        text1.setBounds(130,50,220,30);
        add(text1);
        text1.setBackground(Color.decode("#cccccc"));

        JLabel genderL=new JLabel("Gender: ");
        genderL.setBounds(50,100,100,30);
        add(genderL);


        R1=new JRadioButton("Male");
        R2=new JRadioButton("Female");
        R3=new JRadioButton("Other");
        
        ButtonGroup gp=new ButtonGroup();
        gp.add(R1);
        gp.add(R2);
        gp.add(R3);

        R1.setBounds(130,100,80,30);
        add(R1);
        R2.setBounds(210,100,80,30);
        add(R2);
        R3.setBounds(290,100,80,30);
        add(R3);


        JLabel departL=new JLabel("Department: ");
        departL.setBounds(50,150,100,30);
        add(departL);

        String[] dep={"BBA","BCA","BCom"};
        box=new JComboBox<>(dep);
        box.setBounds(130,150,100,30);
        add(box);

        JButton button1=new JButton("Submit");
        button1.setBounds(50,200,300,30);
        button1.addActionListener(this);
        add(button1);


        out=new JLabel();
        out.setBounds(50,250,200,200);
        add(out);
        setVisible(true);
    }
    public void actionPerformed(ActionEvent e){
        String Name=text1.getText();
        String Gender;
        if(R1.isSelected()){
            Gender="Male";
        }else if(R2.isSelected()){
            Gender="Female";
        }else{
            Gender="Other";
        }
        String DeptData=(String) box.getSelectedItem();

        out.setText("<html>Name : "+Name+"<br>Gender : "+Gender+"<br>Depatment: "+DeptData+"</html>");

        
    }
    public static void main(String ar[]){
        new FN5Q1Register();
    }
}
