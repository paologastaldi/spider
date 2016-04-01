# -*- coding: utf-8 -*-
import os
import sys

#questo crea un processo zombie, ma almeno il processo chiamante (la pagina php) può andare avanti
if os.fork() > 0:
	print "Ricerca avviata"
	sys.exit(0)
else:
	sys.exit(0)
	

# elementi del nostro spider
from spider.spiders.spider import MySpider
from spider.gestioneDatabase import ManagerDB
from spider import settings

# scrapy api
from scrapy import signals
from twisted.internet import reactor
from scrapy.crawler import Crawler
from scrapy.settings import Settings
from scrapy.utils.project import get_project_settings
bloccaProcesso = reactor
