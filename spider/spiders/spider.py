from scrapy.spiders import Spider
from scrapy.selector import Selector
from ..items import ElementoDaEsaminare

class MySpider(Spider):
	name = "spiderRicerca"
	allowed_domains = []
	start_urls = []

	def __init__(self, allowed_domain, start_url):
		self.allowed_domains.append(allowed_domain)
		self.start_urls.append(start_url)
		
		print "Spider> analizzando " + allowed_domain + "..."

	def parse(self, response):
		analizzatorePagina = Selector(response)
		paginaSito = ElementoDaEsaminare()
		paginaSito['body'] = analizzatorePagina.xpath('//body//text()').extract() #estrae tutto il corpo della pagina
		return paginaSito
    	
    	
