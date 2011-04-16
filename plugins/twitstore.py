#!/usr/bin/env python

import json
import sqlalchemy
from sqlalchemy import create_engine

engine = create_engine('mysql:///db.sql', echo=True)

from sqlalchemy import Table, Column, Integer, String, MetaData, ForeignKey
metadata = MetaData()
users_table = Table('media', metadata,
                    Column('id', Integer, primary_key=True),
                    Column('source', String),
                    Column('politician', String),
                    Column('date', String),
                    Column('content', String),
                    Column('location', String))

metadata.create_all(engine)
