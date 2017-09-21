package frame;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import panels.*;

public class mainframe extends JFrame {

	public JPanel contentPane;

	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					mainframe frame = new mainframe();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	public mainframe() {
		UIManager.put("OptionPane.background", Color.white);
		UIManager.put("Panel.background", Color.white);
		
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setBounds(10,10,1280,720);
		setVisible(true);
		setResizable(false);
		setTitle("AES Records Management System V1.1");
		contentPane = new login();
		setContentPane(contentPane);
		addWindowListener(new CloseWindow());
	}
	
	public class CloseWindow extends WindowAdapter {  
		public void windowClosing(WindowEvent e) {  
			int option = JOptionPane.showOptionDialog(mainframe.this,"Are you sure you want to quit AES Records System V1.0?","Warning", JOptionPane.YES_NO_OPTION,JOptionPane.WARNING_MESSAGE, null, null,null );  
			if( option == JOptionPane.YES_OPTION ) {  
				System.exit(0);
			}  
		}  
	}
}
