import scrapy
from scrapy.selector import Selector

from spider.items import ElementoDaEsaminare

class DmozSpider(scrapy.Spider):
    name = ""
    allowed_domains = []
    start_urls = []
    
    def __init__(self, name, allowed_domains, start_urls):
    	self.name = name
    	self.allowed_domains = allowed_domains
    	self.start_urls = start_urls

    def parse(self, response):
    	analizzatorePagina = Selector(response)
    	elencoPagineSito = analizzatorePagina.xpath('//body')
    	elencoElementiDaEsaminare = []
    	
    	for paginaSito in elencoPagineSito
    		elementoDaEsaminare = ElementoDaEsaminare()
    		pagineSito = site.xpath('text()').extract()
    		elencoElementiDaEsaminare.append(elementoDaEsaminare)
    	
    	return elencoElementiDaEsaminare
    	
    	
