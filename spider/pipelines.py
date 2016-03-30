# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html

#from scrapy.exceptions import DropItems
from spider.gestioneDatabase import ManagerDB

class SpiderPipeline(object):	
	def process_item(self, item, spider):
		gestoreDatabase = ManagerDB() #vedi altra feature
		gestoreDatabase.connetti()
		
		elencoProfessori = gestoreDatabase.getElencoCognomi()
		
		for prof in elencoProfessori:
			print prof
		
		item['body'] = [element.lower() for element in item['body']] #tutti gli elementi in minuscolo
		corpoPagina = ''.join(item['body']) #dalla lista ottengo un array

		for professore in elencoProfessori:
			if corpoPagina.find(professore.lower()) >= 0 : #find() restituisce l'indice dell'occorrenza nella stringa):
			
				print "Trovato " + professore
				gestoreDatabase.aggiungiCognome([professore]) #vedi altra feature
		#raise DropItem("Elemento non piu' utile") #eliminazione dell'item (non obbligatoria) (lancia un'eccezione, pertanto non e' stata abilitata)
		
		gestoreDatabase.chiudi()
