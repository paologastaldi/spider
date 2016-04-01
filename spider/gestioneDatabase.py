#Garro Christian	12-02-2016
#Classe che si occupa di collegarsi al database MySql e interagire con lui.
# Deve inoltre occuparsi del contatore dei nomi per poterli poi classificare
#       WARNING!!
#   Per utilizzare correttamente seguire questa breve guida:
#       1-Istanziare un oggetto di questa classe (ma dai,davvero?);
#       2-chiamare il metodo "connetti()" per stabilire una cossessione al db;
#       3-usare i vari metodi aggiungi,elimina,classifica a piacimento;
#       4-per finire chiamare il metodo "close()" per chiudere la connessione;
#!/usr/bin/python

import MySQLdb
#import mysql.connector
#MySQLdb = mysql.connector

class ManagerDB:
    #costruttore della classe
    def __init__(self):
        self.dbName = 'dbspider' #nome del db
        self.host = '127.0.0.1' #posizione del db,"localhost" eventualmente
        self.user = 'root' #username dell'utilizzatore del db
        self.__passwd = '' # password dell'username
        self.__connessione = None
        self.__cursor = None
        self.__urlindex = None #indice per capire a quale url letto sono arrivato
        self.__cognomeindex = None #indice per capire a quale nome sono arrivato a leggere
        self.__tmp = None #variabile da usare al volo 
		

        
    #Metodo che serve per effettuare collegamento con il database. La connessione deve essere
    # chiusa manualmente tramite il metodo 'chiudi()'
    def connetti(self):
        try:
            self.__connessione = MySQLdb.connect(self.host,
                                                self.user,
                                                self.__passwd,
                                                self.dbName)
            self.__cursor = self.__connessione.cursor()	#cursore che uso per accedere ai risultati delle query
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(1)

    #Metodo per chiudere la connessione        
    def chiudi(self):
        try:
            self.__connessione.close()
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(2)

    #Metodo per l'aggiunta di un risultato al db. Controlla la presenza di un nome e in caso
    # affermativo ne va a incrementare il contatore. Gestisce anche array di cognomi.
    def aggiungiCognome(self, cogn):
        for singoloCognome in cogn:
            try:
            	self.__cursor = self.__connessione.cursor()
                self.__cursor.execute('SELECT cognome FROM professori ORDER BY cognome ASC') #pesco tutti i cognomi 
                items = self.__cursor.fetchall()
                for item in items: #scorro tutti i cognomi in cerca di riscontri
                    if item[0].lower() == singoloCognome.lower():
                        self.__cursor.execute("UPDATE professori SET contatore = contatore + 1 WHERE cognome=\'%s\'" % (singoloCognome))
                self.__connessione.commit()
		
            except MySQLdb.Error, e:
                print "Error %d: %s" % (e.args[0],e.args[1])
                #exit(3)
                
    #Paolo Gastaldi 18/03/2016
    #Metodo per ottenere l'elenco dei cognomi che sono stati selezionati dall'utente
    def getElencoCognomi(self):
        try:
            self.__cursor = self.__connessione.cursor()
            self.__cursor.execute('SELECT cognome FROM professori WHERE selezionato ORDER BY cognome ASC') #estraggo tutti i cognomi selezionati
            rows = self.__cursor.fetchall()
            risultati = []
            
            for row in rows:
            	risultati.append(row[0])
            	
            return risultati #ottengo una lista con i soli cognomi
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(-1)

    #Metodo per aggiungere un url. Eventualmente passare un array di url.
    def aggiungiUrl(self, url):
        for item in url:
            try:
                self.__cursor.execute("INSERT INTO indirizzi (urlpartenza) VALUES(\'%s\')" % (item))
                self.__connessione.commit()
            except MySQLdb.Error, e:
                print "Error %d: %s" % (e.args[0],e.args[1])
                #exit(4)

    #Metodo per eliminare un url. Supporta gli array.
    def eliminaUrl(self, url):
        for item in url:
            try:
                self.__cursor.execute("DELETE FROM indirizzi WHERE urlpartenza=\'%s\'" % (item))
                self.__connessione.commit()
            except MySQLdb.Error, e:
                print "Error %d: %s" % (e.args[0],e.args[1])
                #exit(5)

    #Metodo che returna una classifica dei cognomi maggiormanete hittati. Le riporta in ordine descrescente.
    #Meglio se usata in coppia con il metodo classificaHit in modo da avere i valori allineati.
    def classificaCognomi(self):
        try:
            self.__cursor.execute('SELECT cognome FROM professori ORDER BY contatore DESC') 
            return self.__cursor.fetchall()
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(6)  

    #Metodo che returna una classifica dei valori delle hit dei vari cognomi in ordine descrescente.
    #Da usare con il metodo classificaCognomi per avere valori allineati.
    def classificaHit(self):
        try:
            self.__cursor.execute('SELECT contatore FROM professori ORDER BY contatore DESC')
            return self.__cursor.fetchall()                
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(7)  
            
    #Metodo che restituisce un url in ordine. Restituisce un None(Null) se non sono piu' presenti degli url.
    def leggiUrl(self):
        urlist = [] #preparo la lista
        try:
            self.__cursor.execute('SELECT dominio, urlPartenza FROM indirizzi')
            rows = self.__cursor.fetchall()
            for row in rows:
                urlist.append([row[0], row[1]]) #Paolo Gastaldi 01/04/2016
            return urlist #restituisco una lista contenenti gli url	
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(8) 
        
    #Metodo che restituisce un cognome in ordine. Restituisce un None(Null) se non sono piu' presenti degli url.
    def leggicognome(self):
        try:
            if self.__cognomeindex == None: #Inizializzo il contatore degli url
                self.__cognomeindex = 1
            self.__cursor.execute('SELECT cognome FROM professori')
            for item in range(self.__cognomeindex):
                self.__tmp = self.__cursor.fetchone()	#scorro il cursore di tot
            self.__urlindex = self.__urlindex+1
            return self.__tmp
        except MySQLdb.Error, e:
            print "Error %d: %s" % (e.args[0],e.args[1])
            #exit(9)
