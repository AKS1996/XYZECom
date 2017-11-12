Features:
1) Category I XYZECommerce Android App
2) Backend,in php, on IBM Bluemix
3) User functionalities: signing up, loging in, info update
4) Account functionalities: check balance, get past transcations, make transactions

Flow of events while login/signup :
1) User logins using FB/Google
2) A SLID(Social Login ID) is sent to server to check whether user exists or not
3) If existing user
	Return account info
	Redirect to Dashboard Activity
4) If new
	Redirect to signup activity
	Sent account info to server
	New Entry in `MAIN_TABLE`
	Account open with initial balance of $200

Flow of events while transactions :
1) User enters the SLID, Amount to be transferred
2) User Prompted for password
3) Data sent to server
4) New Entry in `TRANS_TABLE` created

DB Structure:
1) MAIN_TABLE
	SLID	Social Login ID	- UNIQUE
	UNAME	Account User name
	FNAME	User's First Name
	CELL	Cell Phone Number
	PWRD	Password for making transactions
2) TRANS_TABLE
	TO_SLID
	FROM_SLID
	AMOUNT
