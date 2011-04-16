#!/usr/bin/env python

import json
import sqlalchemy
from sqlalchemy import create_engine

engine = create_engine('mysql+mysqldb://testdb.sql', echo=True)

from sqlalchemy import Table, Column, Integer, String, MetaData, ForeignKey
metadata = MetaData()
medias_table = Table('media', metadata,
                     Column('id', Integer, primary_key=True),
                     Column('source', String),
                     Column('date', String),
                     Column('location', String),
                     Column('content', String),
                     Column('person', String))

metadata.create_all(engine)

class Media(object):
    def __init__(self, source, date, content, location, person):
        self.source = source
        self.date = date
        self.location = location
        self.content = content
        self.person = person

    def __repr__(self):
        return "<Media('%s','%s', '%s', '%s', '%s')>" % (self.source, self.date, self.location, self.content, self.person)

from sqlalchemy.orm import mapper
mapper(Media, media_table)

tw_obama_1 = Media('twitter', 'Sat Apr 16 21:33:16 +0000 2011', '', 'Obama')
