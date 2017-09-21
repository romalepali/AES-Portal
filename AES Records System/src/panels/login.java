package panels;

import java.awt.Color;

import javax.swing.*;
import java.awt.*;

public class login extends JPanel {
	private JTextField userfield;
	private JPasswordField passfield;
	public login() {
		setLayout(null);
		setSize(1280,720);
		setBackground(Color.white);
		
		userfield = new JTextField();
		userfield.setFont(new Font("Tahoma", Font.PLAIN, 12));
		userfield.setHorizontalAlignment(SwingConstants.CENTER);
		userfield.setBounds(437, 283, 400, 40);
		add(userfield);
		userfield.setColumns(10);
		
		passfield = new JPasswordField();
		passfield.setEchoChar('*');
		passfield.setFont(new Font("Tahoma", Font.PLAIN, 12));
		passfield.setHorizontalAlignment(SwingConstants.CENTER);
		passfield.setBounds(437, 375, 400, 40);
		add(passfield);
		
		JLabel passlbl = new JLabel("PASSWORD");
		passlbl.setFont(new Font("Tahoma", Font.BOLD, 12));
		passlbl.setHorizontalAlignment(SwingConstants.LEFT);
		passlbl.setBounds(438, 359, 400, 14);
		add(passlbl);
		
		JLabel userlbl = new JLabel("USERNAME");
		userlbl.setFont(new Font("Tahoma", Font.BOLD, 12));
		userlbl.setHorizontalAlignment(SwingConstants.LEFT);
		userlbl.setBounds(437, 267, 400, 14);
		add(userlbl);
		
		JButton loginbtn = new JButton("LOG IN");
		loginbtn.setFont(new Font("Tahoma", Font.BOLD, 12));
		loginbtn.setBounds(594, 452, 89, 40);
		add(loginbtn);
		loginbtn.setFocusPainted(false);
		loginbtn.setBackground(Color.white);
		loginbtn.setForeground(Color.black);
		
		JLabel logo = new JLabel("");
		logo.setIcon(new ImageIcon(login.class.getResource("/images/logo.png")));
		logo.setBounds(585, 131, 100, 100);
		add(logo);
	}
}
