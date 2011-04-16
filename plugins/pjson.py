#!/usr/bin/env python

import sys
import json

print(json.dumps(json.loads(sys.stdin.read()), indent=4))
sys.exit(0)
